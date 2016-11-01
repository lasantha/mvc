<?php 
/**
* 
*/
class UserController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->msg ="Login Index !";
		$this->view->render("User/index");
	}

	public function login(){
		Session::init();
		if(Session::get('loggedIn')){
			header("Location:".URL."user");
		}
		$this->view->render("User/login");
	}

	public function run(){
		$uname = $_POST['user_name'];
		$password = $_POST['user_password'];
		$this->model->run($uname,$password);
	}

	public function register(){
		$this->view->render("User/register");
	}

	public function registernow(){
		$uname 		= $_POST['user_name'];
		$password 	= $_POST['user_password'];
		$role		= 'customer';
		$this->model->registernow($uname,$password,$role);
	}
	public function logout(){
		$this->model->logout();
	}

}