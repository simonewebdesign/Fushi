<?php
/* 
This function opens a known directory and reads its content, in order to find a file with specific name.
If the $filename is found in the $path, returns the $filename with the extension, else returns false.

Usage example: 
echo findFile('flaminia','img/'); //returns flaminia.jpg if that file exists 

$filename must be a valid file name, without extension.
$path must finish with a slash (/).

Works with PHP 5.2 and newer.

Created: 27/02/2012

*/

function findFile ($filename, $path) {
	if (is_dir($path)) {
		if ($dir = opendir($path)) {
			while (($file = readdir($dir)) !== false) {
				if (is_file($path.$file)) {
					$info = pathinfo($path.$file);
					if ($info['filename'] == $filename) {
						return $file;
					}
				}
			}
			closedir($dir);
		}
	}
	return false;
}