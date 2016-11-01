<?php 
/**
* 
*/
class Bootstrap
{
	function __construct()
	{
		$url = isset($_GET['url'])?$_GET['url']:null;
		if (empty($url[0])) {
			require_once 'controllers/IndexController.php';	
			$controller = new IndexController();
			$controller->index();
			return false;
		}
		$url = rtrim($url,'/');
		$url = explode('/', $url);

		$file = 'controllers/'.ucfirst($url[0]).'Controller.php';

		if (file_exists($file)) {
			require_once $file;	
		}
		else{
			require_once 'controllers/ErrorController.php';;	
			$controller = new ErrorController();
			return false;
		}
		
		$requestController = ucfirst($url[0]).'Controller';
		$controller = new $requestController;
		$controller->loadModel($url[0]);
		
		if (isset($url[2])) {
			$controller->{$url[1]}($url[2]);
		}
		else{
			if (isset($url[1])) {
				$controller->{$url[1]}();
			}
			else{
				$controller->index();
			}
			
		}

	}
}