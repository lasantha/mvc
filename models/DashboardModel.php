<?php 
/**
* 
*/
class DashboardModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function create(){
		//$this->updateFiles();
		// if($this->checkValidiry($uname)){
		// 	header("Location:".URL."user/register?msg=Login already registerd, Please try another name !");
		// }
		// else{

		$q = $this->db->prepare("INSERT INTO products (product_name, product_image ,product_description,product_price) VALUES (:product_name,:product_image,:product_description,:product_price)");

		$q->execute(
			array(
				'product_name'			=> $_POST['product_name'],
				'product_image' 		=> '-',
				'product_description'	=> $_POST['product_description'],
				'product_price'	   		=> $_POST['product_price']
				)
			);

		if ($this->db->lastInsertId()) {
			if (!empty($_FILES["product_image"]["name"])) {
				if( $this->updateFiles($this->db->lastInsertId())){
					$target_dir = "uploads/";
					$target_file = $target_dir.basename($_FILES["product_image"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$q = $this->db->prepare("UPDATE products SET product_image =:product_image WHERE id=:id");
					$q->execute(
						array(
							'id'=>$this->db->lastInsertId(),
							'product_image' => $this->db->lastInsertId().'.'.$imageFileType,
							)
						);
					header("Location:".URL."dashboard");
				}
			}
			else{
				header("Location:".URL."dashboard");
			}

		}

		// }
	}

	function updateFiles($lastInsertId){
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["product_image"]["name"]);
		$uploadOk = false;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["product_image"]["tmp_name"]);
			if($check !== false) {
				// echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = true;
			} else {
				// echo "File is not an image.";
				$uploadOk = false;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			// echo "Sorry, file already exists.";
			$uploadOk = false;
		}
		// Check file size
		if ($_FILES["product_image"]["size"] > 5000000) {
			// echo "Sorry, your file is too large.";
			$uploadOk = false;
		}
		// Allow certain file formats
		$arrayAllowed = array('jpg','png','jpeg','gif');

		if( !in_array($imageFileType,$arrayAllowed) ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = false;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == false) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_dir.$lastInsertId.'.'.$imageFileType)) {
				return true;
			} else {
				return false;
			}
		}
	}

	function getProduct($id){
		$q = $this->db->prepare("SELECT * from products WHERE id=:id;");
		$q->execute(array('id'=>$id));
		$data = $q->fetch();
		return $data;
	}

	function getProducts(){
		$q = $this->db->prepare("SELECT * from products;");
		$q->execute();
		$data = $q->fetchAll();
		return $data;
	}

	function edit_product($id){
		$q = $this->db->prepare("UPDATE products SET product_name = :product_name, product_description=:product_description,product_price=:product_price WHERE id=:id");

		$q->execute(
			array(
				'id' => $id,
				'product_name'			=> $_POST['product_name'],
				'product_description'	=> $_POST['product_description'],
				'product_price'	   		=> $_POST['product_price']
				)
			);
		if ($id) {
			if (!empty($_FILES["product_image"]["name"])) {
				if( $this->updateFiles($id)){
					$target_dir = "uploads/";
					$target_file = $target_dir.basename($_FILES["product_image"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$q = $this->db->prepare("UPDATE products SET product_image =:product_image WHERE id=:id");
					$q->execute(
						array(
							'id'=>$id,
							'product_image' => $id.'.'.$imageFileType,
							)
						);
					header("Location:".URL."dashboard");
				}
			}
			else{
				header("Location:".URL."dashboard");
			}

		}
	}
}