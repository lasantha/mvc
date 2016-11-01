<?php 
/**
* 
*/
class UserModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		//echo md5('test');
	}

	function run($uname,$password){
		$q = $this->db->prepare("SELECT id,user_name,role FROM users WHERE user_name = :user_name AND password = MD5(:password);");
		$q->execute(
			array(
				'user_name'=>$uname,
				'password' =>$password
			)
		);
		$rCount = $q->rowCount();
		if ($rCount > 0) {
			Session::init();
			Session::set('loggedIn',true);
			$data = $q->fetch();
			Session::set('role',$data['role']);
			if($data['role'] == 'admin'){
				header("Location:".URL."dashboard");
			}
			else{
				$this->view->msg ="Login Index !";
				header("Location:".URL."user");
			}
			 
		}
		else{
			header("Location:".URL."user/login");
		}
	}

	function logout(){
		Session::init();
		Session::distroy();
		header("Location:".URL."user/login");
	}

	function registernow($uname,$password,$role){
		if($this->checkValidiry($uname)){
			header("Location:".URL."user/register?msg=Login already registerd, Please try another name !");
		}
		else{
			
			$q = $this->db->prepare("INSERT INTO users (user_name, password ,role) VALUES (:user_name,:password,:role)");

			$q->execute(
				array(
					'user_name'=>$uname,
					'password' =>md5($password),
					'role'	   =>$role
				)
			);
			 header("Location:".URL."user/login");
		}
		
	}

	function checkValidiry($uname){
		$q = $this->db->prepare("SELECT id,user_name,role FROM users WHERE user_name = :user_name");
		$q->execute(
			array(
				'user_name'=>$uname,
			)
		);
		$rCount = $q->rowCount();
		if ($rCount > 0)
			return true;
		else
			return false;
	}
}