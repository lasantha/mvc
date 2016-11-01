<?php 
/**
* 
*/
class HelpController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->msg ="Help Index !";
		$this->view->render("Help/index");
	}

	public function other( $args = false ){
		echo "We are inside other</br>";
		echo "Optional argument : ".$args;
		require_once 'models/HelpModel.php';
		$model = new HelpModel();
		$this->view->render("Help/other");
	}
}