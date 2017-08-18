<?php

namespace ChatLune;

class PhpIni
{
    public static function get_file_upload_size() {
	$post_max_size = self::return_bytes(ini_get('post_max_size'));
	$upload_max_filesize = self::return_bytes(ini_get('upload_max_filesize'));

	return min($post_max_size, $upload_max_filesize);
    }

    public static function ini_get_bytes($param) {
	return self::return_bytes(ini_get($param));
    }

    // Utility function from http://php.net/manual/en/function.ini-get.php
    public static function return_bytes($val) {
	$val = trim($val);
	$last = strtolower($val[strlen($val)-1]);
	switch($last) {
	    // The 'G' modifier is available since PHP 5.1.0
	    case 'g':
		$val *= 1024;
	    case 'm':
		$val *= 1024;
	    case 'k':
		$val *= 1024;
	}

	return $val;
    }
}

?>
