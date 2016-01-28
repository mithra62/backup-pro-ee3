<?php 
/**
 * Backup Pro - Helper Functions
 *
 * Helper Functions
 *
 * @author		Eric Lamb
 * @filesource 	./system/expressionengine/third_party/backup_pro/helpers/utilities_helper.php
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('mime_content_type')) 
{

	/**
	 * Mimics the behavior of PHP's build in function if it doens't exist
	 * @param string $filename
	 * @return Ambigous <string>|unknown|string
	 */
	function mime_content_type($filename) {

		$mime_types = array(

			'txt' => 'text/plain',
			'htm' => 'text/html',
			'html' => 'text/html',
			'php' => 'text/html',
			'css' => 'text/css',
			'js' => 'application/javascript',
			'json' => 'application/json',
			'xml' => 'application/xml',
			'swf' => 'application/x-shockwave-flash',
			'flv' => 'video/x-flv',

			// images
			'png' => 'image/png',
			'jpe' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpeg',
			'gif' => 'image/gif',
			'bmp' => 'image/bmp',
			'ico' => 'image/vnd.microsoft.icon',
			'tiff' => 'image/tiff',
			'tif' => 'image/tiff',
			'svg' => 'image/svg+xml',
			'svgz' => 'image/svg+xml',

			// archives
			'zip' => 'application/zip',
			'rar' => 'application/x-rar-compressed',
			'exe' => 'application/x-msdownload',
			'msi' => 'application/x-msdownload',
			'cab' => 'application/vnd.ms-cab-compressed',

			// audio/video
			'mp3' => 'audio/mpeg',
			'qt' => 'video/quicktime',
			'mov' => 'video/quicktime',

			// adobe
			'pdf' => 'application/pdf',
			'psd' => 'image/vnd.adobe.photoshop',
			'ai' => 'application/postscript',
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',

			// ms office
			'doc' => 'application/msword',
			'rtf' => 'application/rtf',
			'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',

			// open office
			'odt' => 'application/vnd.oasis.opendocument.text',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		);

		$ext = strtolower(array_pop(explode('.',$filename)));
		if (array_key_exists($ext, $mime_types)) {
			return $mime_types[$ext];
		}
		elseif (function_exists('finfo_open')) {
			$finfo = finfo_open(FILEINFO_MIME);
			$mimetype = finfo_file($finfo, $filename);
			finfo_close($finfo);
			return $mimetype;
		}
		else {
			return 'application/octet-stream';
		}
	}	
}

if(!function_exists('m62_theme_url'))
{
	/**
	 * Sets up the third party theme URL
	 * @return string
	 */
	function m62_theme_url()
	{
		$url = '';
		if(defined('URL_THIRD_THEMES'))
		{
			$url = URL_THIRD_THEMES;
		}
		else
		{
			$url = rtrim(ee()->config->config['theme_folder_url'], '/') .'/third_party/';
		}

		return $url;
	}
}

if(!function_exists('m62_theme_path'))
{
	/**
	 * Sets up the third party themes path
	 * @return string
	 */
	function m62_theme_path()
	{
		$path = '';
		if(defined('PATH_THIRD_THEMES'))
		{
			$path = PATH_THIRD_THEMES;
		}
		else
		{
			$path = rtrim(ee()->config->config['theme_folder_path'], '/') .'/third_party/';
		}

		return $path;
	}
}

if(!function_exists('m62_third_party_path'))
{
	/**
	 * Sets up the third party add-ons path
	 * @return string
	 */
	function m62_third_party_path()
	{
		$path = '';
		if(defined('PATH_THIRD'))
		{
			$path = PATH_THIRD;
		}
		else
		{
			$path = APPPATH.'third_party/';
		}

		return $path;
	}
}