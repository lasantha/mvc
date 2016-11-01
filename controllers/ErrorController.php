<?php 

/**
* 
*/
class ErrorController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$this->view->msg = "This page doesn't exist";
		$this->view->render("Error/index");
	}
}