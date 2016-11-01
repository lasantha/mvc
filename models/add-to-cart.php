<?php
	$mainPath = '../';
	include_once("{$mainPath}sessions.php");
	require_once("{$mainPath}config.php");
	require_once("{$mainPath}classes/books.class.php");
	$Book = new Book(HOST,USER,PASSWORD,DB);
	$action = $_POST['action'];
	$item   = $_POST['item'];
	if($action == 'setToCart'){
		$bitem   = explode('bid-', $item );
		$query  = '';
		if(count($bitem) < 2 ){
			$item   = explode('oid-', $item );
			$query = "select * from bnsms_items it where it.item_id = ".$item[1]." and it.status = 1;";
		}
		else{
			$query = "select * from bnsms_items it inner join bnsms_books b on b.book_id = it.book_id where it.book_id = ".$bitem[1]." and it.status = 1;";
		}
		$arrayResult = array();
	
		
		$res = $Book->mysqlSelect($query);
		$row = mysql_fetch_assoc($res);
		$arrayResult['result'] = true;  
		$qty = 1;
		if(isset($_SESSION['cart']['items']) && in_array($row['item_id'],$_SESSION['cart']['items']['id'])){
			$k = array_search($row['item_id'], $_SESSION['cart']['items']['id']);
			$_SESSION['cart']['items']['name'][$k]  =  $row['item_name'];
			$_SESSION['cart']['items']['qty'][$k]   +=  (int)$qty;
			$_SESSION['cart']['items']['price'][$k] +=  $row['selleing_price'];
			$arrayResult['cart'] = $_SESSION['cart'];
		}
		else{
			$_SESSION['cart']['items']['id'][]    =  $row['item_id'];
			$_SESSION['cart']['items']['name'][]  =  $row['item_name'];
			$_SESSION['cart']['items']['qty'][]   =  (int)$qty;
			$_SESSION['cart']['items']['price'][] =  $row['selleing_price'];
			$arrayResult['cart'] = $_SESSION['cart'];
		}
		echo json_encode($arrayResult);
	}
	else if ($action == "removeFromCart") {
		$arrayResult = array();
		if (($key = array_search($item, $_SESSION['cart']['items']['id'])) !== false) {
		    unset($_SESSION['cart']['items']['id'][$key]);
		    unset($_SESSION['cart']['items']['name'][$key]);
		    unset($_SESSION['cart']['items']['qty'][$key]);
		    unset($_SESSION['cart']['items']['price'][$key]);

		    $_SESSION['cart']['items']['id']     = array_values($_SESSION['cart']['items']['id']);
		    $_SESSION['cart']['items']['name']   = array_values($_SESSION['cart']['items']['name']);
		    $_SESSION['cart']['items']['qty']    = array_values($_SESSION['cart']['items']['qty']);
		    $_SESSION['cart']['items']['price']  = array_values($_SESSION['cart']['items']['price']);
		    $arrayResult['result'] = true;  
		    $arrayResult['cart'] = $_SESSION['cart'];
		}
		
		echo json_encode($arrayResult);		  
	}
	
?>