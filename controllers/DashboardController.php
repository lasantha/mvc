<?php 
/**
* 
*/
class DashboardController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		if(!Session::get('loggedIn')){
			header("Location:".URL."user/login");
		}
		elseif (Session::get('role') != 'admin') {
			header("Location:".URL."user");
		}
	}

	public function index(){
		$this->view->msg = $this->model->getProducts();
		$this->view->render("Dashboard/index");
	}

	public function create_product(){
		$this->view->render("Dashboard/create_product");
	}

	public function create(){
		$this->model->create();
	}

	public function edit($args = false){
		$id = $args;
		$this->view->data = $this->model->getProduct($id);
		$this->view->render("Dashboard/edit");
	}

	public function edit_product($args = false){
		$id = $args;
		$this->model->edit_product($id);
	}
	
}