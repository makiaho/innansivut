<?php
/**
* SomeLoader class implements class loading from library: SOME_LIBRARY folder.
* <p>This class is not usually used directly, but instead program code should use someloader() function.
* <br />eg. someloader('some.session.session')
* </p>
* @package wo2009
*/

/**
* 
* @package wo2009
*/ 
class SomeLoader {


	public static function import( $filePath, $base = null, $key = 'library.' )
	{
		static $paths;

		if (!isset($paths)) {
			$paths = array();
		}

		$keyPath = $key ? $key . $filePath : $filePath;

		if (!isset($paths[$keyPath]))
		{
			
			if ( ! $base ) {
				$base =  dirname( __FILE__ );
			}

			$parts = explode( '.', $filePath );
			
			$classname = array_pop( $parts );
			switch($classname)
			{
				case 'helper' :
					$classname = ucfirst(array_pop( $parts )).ucfirst($classname);
					break;

				default :
					$classname = ucfirst($classname);
					break;
			}

			$path  = str_replace( '.', DS, $filePath );

			if (strpos($filePath, 'some') === 0)
			{
				/*
				 * If we are loading a some class prepend the classname with a
				 * capital Some.
				 */
				$classname	= 'Some'.$classname;
				$classes	= SomeLoader::register($classname, $base.DS.$path.'.php');
				$rs			= isset($classes[strtolower($classname)]);
			}
			else
			{
				/*
				 * If it is not in the some namespace then we have no idea if
				 * it uses our pattern for class names/files so just include.
				 */
				
				$rs   = require($base.DS.$path.'.php');
			}

			$paths[$keyPath] = $rs;
		}

		return $paths[$keyPath];
	}

	/**
	 * Add a class to autoload
	 *
	 * @param	string $classname	The class name
	 * @param	string $file		Full path to the file that holds the class
	 * @return	array|boolean  		Array of classes
	 * @since 	1.5
	 */
	public static function & register ($class = null, $file = null)
	{
		static $classes;

		if(!isset($classes)) {
			$classes    = array();
		}

		if($class && is_file($file))
		{
			// Force to lower case.
			$class = strtolower($class);
			$classes[$class] = $file;

			// In php4 we load the class immediately.
			if((version_compare( phpversion(), '5.0' ) < 0)) {
				SomeLoader::load($class);
			}

		}

		return $classes;
	}


	/**
	 * Load the file for a class
	 *
	 * @access  public
	 * @param   string  $class  The class that will be loaded
	 * @return  boolean True on success
	 * @since   1.5
	 */
	public static function load( $class )
	{
		$class = strtolower($class); //force to lower case

		if (class_exists($class)) {
			  return;
		}

		$classes = SomeLoader::register();
		if(array_key_exists( strtolower($class), $classes)) {
			include($classes[$class]);
			return true;
		}
		return false;
	}
}


/**
 * When calling a class that hasn't been defined, __autoload will attempt to
 * include the correct file for that class.
 *
 * This function get's called by PHP. Never call this function yourself.
 *
 * @param 	string 	$class
 * @access 	public
 * @return  boolean
 * @since   1.5
 */
function __autoload($class)
{
	if(SomeLoader::load($class)) {
		return true;
	}
	return false;
}

/**
 * Global application exit.
 *
 * This function provides a single exit point for the framework.
 *
 * @param mixed Exit code or string. Defaults to zero.
 */
function someexit($message = 0) {
    exit($message);
}
/**
* Java import equivalent.
* <p>Example usage: someloader('some.session.session');</p>
* @param string comma separeted path
*/
function someloader($filepath) {
	return SomeLoader::import($filepath);
}