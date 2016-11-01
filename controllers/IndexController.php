<?php 
/**
* 
*/
class IndexController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->msg ="Welcome My MVC!";
		require_once 'models/DashboardModel.php';
		$dModel = new DashboardModel();
		$this->view->data = $dModel->getProducts();
		$this->view->render("Index/index");
	}
}