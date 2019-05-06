<?php 
session_start();

class Products
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getProducts(){
		$q = $this->con->query("SELECT p.pro_id, p.pro_name, p.image, p.description, p.price, c.cate_name, c.cate_id FROM products p JOIN categories c ON c.cate_id = p.cate_id");
		
		$products = [];
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
                            $row['pro_name'] = utf8_encode($row['pro_name']);
                            $row['image'] = utf8_encode($row['image']);
                            $row['description'] = utf8_encode($row['description']);
                            $products[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['products'] = $products;
		}

		$categories = [];
		$q = $this->con->query("SELECT * FROM categories");
		if ($q->num_rows > 0) {
			while($row = $q->fetch_assoc()){
				$categories[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['categories'] = $categories;
		}

		return ['status'=> 202, 'message'=> $_DATA];
	}

	public function addProduct($pro_name,
								$cate_id,
								$description,
								$price,
								$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/web-project/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("INSERT INTO `products`(`pro_name`, `cate_id`, `description`, `price`, `image`) VALUES ('$pro_name', '$cate_id', '$description', '$price', '$uniqueImageName')");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Product Added Successfully..!'];
					}else{
						return ['status'=> 303, 'message'=> 'Failed to run query'];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}


	public function editProductWithImage($pid,
										$pro_name,
										$cate_id,
										$description,
										$price,
										$file){


		$fileName = $file['name'];
		$fileNameAr= explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			
			//print_r($file['size']);

			if ($file['size'] > (1024 * 2)) {
				
				$uniqueImageName = time()."_".$file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/web-project/product_images/".$uniqueImageName)) {
					
					$q = $this->con->query("UPDATE `products` SET 
										`cate_id` = '$cate_id',
										`pro_name` = '$pro_name',
										`price` = '$price', 
										`description` = '$description', 
										`image` = '$uniqueImageName'
										WHERE pro_id = '$pid'");

					if ($q) {
						return ['status'=> 202, 'message'=> 'Product Modified Successfully..!'];
					}else{
						return ['status'=> 303, 'message'=> $this->con->error];
					}

				}else{
					return ['status'=> 303, 'message'=> 'Failed to upload image'];
				}

			}else{
				return ['status'=> 303, 'message'=> 'Large Image ,Max Size allowed 2MB'];
			}

		}else{
			return ['status'=> 303, 'message'=> 'Invalid Image Format [Valid Formats : jpg, jpeg, png]'];
		}

	}

	public function editProductWithoutImage($pid,
										$pro_name,
										$cate_id,
										$description,
										$price){

		if ($pid != null) {
			$q = $this->con->query("UPDATE `products` SET 
										`cate_id` = '$cate_id',
										`pro_name` = '$pro_name',
										`price` = '$price', 
										`description` = '$description'
										WHERE pro_id = '$pid'");

			if ($q) {
				return ['status'=> 202, 'message'=> 'Product updated Successfully'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=> 'Invalid product id'];
		}
		
	}


	

	public function addCategory($name){
		$q = $this->con->query("SELECT * FROM categories WHERE cate_name = '$name' LIMIT 1");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Category already exists'];
		}else{
			$q = $this->con->query("INSERT INTO categories (cate_name) VALUES ('$name')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'New Category added Successfully'];
			}else{
				return ['status'=> 303, 'message'=> 'Failed to run query'];
			}
		}
	}

	public function getCategories(){
		$q = $this->con->query("SELECT * FROM categories");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status'=> 202, 'message'=> $ar];
	}

	public function deleteProduct($pid = null){
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM products WHERE pro_id = '$pid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Product removed from stocks'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid product id'];
		}

	}

	public function deleteCategory($cid = null){
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM categories WHERE cate_id = '$cid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Category removed'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid cattegory id'];
		}

	}
	
	

	public function updateCategory($post = null){
		extract($post);
		if (!empty($cate_id) && !empty($e_cate_name)) {
			$q = $this->con->query("UPDATE categories SET cate_name = '$e_cate_name' WHERE cate_id = '$cate_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Category updated'];
			}else{
				return ['status'=> 202, 'message'=> 'Failed to run query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Invalid category id'];
		}

	}

	

	

	

}


if (isset($_POST['GET_PRODUCT'])) {
    $p = new Products();
    echo json_encode($p->getProducts());
    exit();
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (!empty($pro_name)
	&& !empty($cate_id)
	&& !empty($description)
	&& !empty($price)
	&& !empty($_FILES['image']['name'])) {
		

		$p = new Products();
		$result = $p->addProduct($pro_name,
								$cate_id,
								$description,
								$price,
								$_FILES['image']);
		
		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}



	
}


if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (!empty($pid)
	&& !empty($e_pro_name)
	&& !empty($e_cate_id)
	&& !empty($e_description)
	&& !empty($e_price) ) {
		
		$p = new Products();

		if (isset($_FILES['e_image']['name']) 
			&& !empty($_FILES['e_image']['name'])) {
			$result = $p->editProductWithImage($pid,
								$e_pro_name,
								$e_cate_id,
								$e_description,
								$e_price,
								$_FILES['e_image']);
		}else{
			$result = $p->editProductWithoutImage($pid,
								$e_pro_name,
								$e_cate_id,
								$e_description,
								$e_price);
		}

		echo json_encode($result);
		exit();


	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		exit();
	}



	
}



if (isset($_POST['add_category'])) {
		$cate_name = $_POST['cate_name'];
		if (!empty($cate_name)) {
			$p = new Products();
			echo json_encode($p->addCategory($cate_name));
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Empty fields']);
		}
	
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();
	
}

if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Products();
		if(!empty($_POST['pid'])){
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Invalid product id']);
			exit();
		}
	


}


if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cate_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Invalid details']);
		exit();
	}
}



?>