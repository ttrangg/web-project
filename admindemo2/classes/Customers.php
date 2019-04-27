<?php 
session_start();
/**
 * 
 */
class Customers
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getCustomers(){
		$query = $this->con->query("SELECT * FROM `user_info`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no customer data'];
	}


//	public function getCustomersOrder(){
//		$query = $this->con->query("SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.p_status, p.product_title, p.product_image FROM orders o JOIN products p ON o.product_id = p.product_id");
//		$ar = [];
//		if (@$query->num_rows > 0) {
//			while ($row = $query->fetch_assoc()) {
//				$ar[] = $row;
//			}
//			return ['status'=> 202, 'message'=> $ar];
//		}
//		return ['status'=> 303, 'message'=> 'no orders yet'];
//	}
//	

}

if (isset($_POST["GET_CUSTOMERS"])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
}

//if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
//		$c = new Customers();
//		echo json_encode($c->getCustomersOrder());
//		exit();
//}


?>