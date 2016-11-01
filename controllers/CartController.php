<?php 
/**
* 
*/
class CartController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function addtocart( $args = false ){
		$id = $args;
		require_once 'models/CartModel.php';
		$cartObj = new CartModel();
		$cartObj->addtocart($id);
		//$this->view->render("Cart/index");
	}
}