
<script type="text/javascript" src="media/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
        $(function() {
                $('#thequote').tinymce({
                        // Location of TinyMCE script
                        script_url : 'media/tinymce/jscripts/tiny_mce/tiny_mce.js',

                        // General options
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                        // Theme options
                        //theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        //theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        //theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                        //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                        //theme_advanced_toolbar_location : "top",
                        //theme_advanced_toolbar_align : "left",
                        //theme_advanced_statusbar_location : "bottom",
                        //theme_advanced_resizing : true,

                        // Example content CSS (should be your site CSS)
                        content_css : "css/content.css",

                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url : "lists/template_list.js",
                        external_link_list_url : "lists/link_list.js",
                        external_image_list_url : "lists/image_list.js",
                        media_external_list_url : "lists/media_list.js",

                        // Replace values for the template plugin
                        template_replace_values : {
                                username : "Some User",
                                staffid : "991234"
                        }
                });
        });
</script>
<h1>
<?php
$id       = $this->quote->getId();
$thequote = $this->quote->getThequote();
$bywhom   = $this->quote->getBywhom();
$whenyear = $this->quote->getWhenyear();


 if ($id) {
	echo SomeText::sprintf('QUOTE FORM EDIT',$id);
 } else {
	echo SomeText::_('QUOTE FORM NEW');
 }
?>
</h1>
<?php
	if (!empty($this->errors)) {
		echo "<div id='errorbox'>";
		foreach ($this->errors as $error) {
			echo "<div id='erroritem'>". $error . "</div>";
		}
		echo "</div>";
	}
?>
<div class="clearfix"></div>
<style>
.formrow label {
	width:200px;
	display:block;
	float:left;
}
</style>
<form action="index.php" method="post">
	<input type="hidden" name="app" value="quotes" />
	<input type="hidden" name="view" value="<?php if ($id === null) echo "create"; else echo "update"; ?>" />
	<input type="hidden" name="issubmit" value="1" />
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	
	<div class="formrow">
	<label for="thequote"><?php echo SomeText::_('QUOTETH QUOTE') ?>:</label>
	<textarea id="thequote" name="thequote"><?php echo $thequote; ?></textarea>
	</div>
	
	<div class="formrow">
	<label for="bywhom"><?php echo SomeText::_('QUOTETH WHO') ?>:</label>
	<input type="text" name="bywhom" value="<?php echo $bywhom; ?>" />
	</div>

	<div class="formrow">
	<label for="whenyear"><?php echo SomeText::_('QUOTETH WHEN') ?>:</label>
	<input type="text" name="whenyear" value="<?php echo $whenyear; ?>" />
	</div>
	
	<div class="formrow">
	<input type="submit" value="<?php echo SomeText::_('SEND') ?>" />
	</div>

	
</form>
 