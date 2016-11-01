<?php 
/**
* 
*/
class Controller
{
	
	function __construct()
	{
		$this->view = new view();
	}

	public function loadModel($name)
	{
		$path = 'models/'.ucfirst($name).'Model.php';
		if (file_exists($path)) {
			require_once $path;
			$modelName = ucfirst($name).'Model';
			$this->model = new $modelName();
		}
		
		
		
	}
}