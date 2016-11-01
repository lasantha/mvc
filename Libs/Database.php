<?php 
/**
* 
*/
class Database extends PDO
{
	
	function __construct()
	{
		$user='root';
		$pass='';
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		parent::__construct("mysql:host=localhost;dbname=php_mvc", $user, $pass);
	}
}