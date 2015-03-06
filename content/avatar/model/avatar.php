<?php
/**
* @package content
* @subpackage user
*/
someloader('some.application.model');

/**
* @package content
* @subpackage user
*/

class SomeModelAvatar extends SomeModel {

  	protected $avatardata = array();

	public function __construct(array $options=array()) {
		parent::__construct($options);
	}
	

	
	public function createAvatar() {
		// get uploaded file. Copy it to cache crop it to max 100*120.
		$files = SomeRequest::get('files');
		//var_dump($files);
		$uploaddir = SOME_CACHE;
		$uploadfile = $uploaddir . DS . basename($_FILES[$this->getFieldname()]['name']);
		$basename = basename($_FILES[$this->getFieldname()]['name']);
		
		if (move_uploaded_file($files[$this->getFieldname()]['tmp_name'], $uploadfile)) {
		    echo "File is valid, and was successfully uploaded.\n";
			$this->avatardata['href'] = "cache/$basename";
			$this->avatardata['file'] = $uploadfile;
			$this->avatardata['name'] = $basename;
			
		} else {
		    echo "Possible file upload attack!\n";
		}
		$this->makeThumb();
	}
	
	public function makeThumb() {
		$image = imagecreatefromjpeg($this->avatardata['file']);
		$filename = 'cache/thumb'.$this->avatardata['name'];
		
		$this->avatardata['hrefthumb'] = $filename;
		
		$thumb_width = 200;
		$thumb_height = 150;
		
		$width = imagesx($image);
		$height = imagesy($image);
		
		$original_aspect = $width / $height;
		$thumb_aspect = $thumb_width / $thumb_height;
		
		if($original_aspect >= $thumb_aspect) {
		   // If image is wider than thumbnail (in aspect ratio sense)
		   $new_height = $thumb_height;
		   $new_width = $width / ($height / $thumb_height);
		} else {
		   // If the thumbnail is wider than the image
		   $new_width = $thumb_width;
		   $new_height = $height / ($width / $thumb_width);
		}
		
		$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		
		// Resize and crop
		imagecopyresampled($thumb,
		                   $image,
		                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
		                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
		                   0, 0,
		                   $new_width, $new_height,
		                   $width, $height);
		imagejpeg($thumb, $filename, 80);
		
		
	}
	
	public function getFieldname() {
		return "avatarimg";
	}
	
	public function getAvatarData() {
		return $this->avatardata;
	}
	


}