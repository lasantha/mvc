<?php 
/**
* 
*/
class CartModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
		//echo md5('test');
	}

	function addtocart($id = false){
		if(!empty($id)) {
			$ex = $this->db->prepare("SELECT * FROM products WHERE id=:id");
			$ex->execute(
				array('id'=>$id)
			);
			$row = $ex->fetch();
			Session::init();
			$cart = Session::get('cart');
			if ( !$cart || !in_array($id, $cart['cart']['items']['item_id']) ) {
				$cart['cart']['items']['item_id'][] 	= $row['id'];
				$cart['cart']['items']['item_name'][] 	= $row['product_name'];
				$cart['cart']['items']['item_price'][]	= $row['product_price'];
				$cart['cart']['items']['item_image'][]	= $row['product_image'];
				$cart['cart']['items']['item_qty'][] 	= 1;
				Session::set('cart',$cart);
			}
			else{
				if ( isset($cart['cart']['items']) && in_array($id, $cart['cart']['items']['item_id'])) {
					$key = array_search($id, $cart['cart']['items']['item_id']);
					$cart['cart']['items']['item_qty'][$key] += 1;
					$cart['cart']['items']['item_price'][$key] = $cart['cart']['items']['item_qty'][$key] * $row['product_price'];

					Session::set('cart',$cart);
				}

			}
		}
		
		header("Location:".URL);
	}

	function removeFromCart($id){
		Session::init();
		$cart = Session::get('cart');
		if (($key = array_search($id, $cart['cart']['items']['item_id'])) !== false) {

		    Session::sesunset($cart['cart']['items']['item_id'][$key]);
		    Session::sesunset($cart['cart']['items']['item_name'][$key]);
		    Session::sesunset($cart['cart']['items']['item_price'][$key]);
		    Session::sesunset($cart['cart']['items']['item_qty'][$key]);

		    $cart['cart']['items']['item_id']     = array_values($cart['cart']['items']['item_id']);
		    $cart['cart']['items']['item_name']   = array_values($cart['cart']['items']['item_name']);
		    $cart['cart']['items']['item_price']  = array_values($cart['cart']['items']['item_price']);
		    $cart['cart']['items']['item_qty']    = array_values($cart['cart']['items']['item_qty']);

		    Session::set('cart',$cart);
		}
	}
}