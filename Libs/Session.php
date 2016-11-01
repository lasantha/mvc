<?php
/**
* 
*/
class Session 
{
	public static function init()
	{
		@session_start();
	}

	public static function set($key,$value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}

	public static function distroy()
	{
		//unset($_SESSION);
		session_destroy();
	}

	public static function sesunset( $data ){
		 unset($data);
	}
}