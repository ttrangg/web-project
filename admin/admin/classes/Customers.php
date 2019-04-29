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
		$query = $this->con->query("SELECT `cus_id`, `cus_name`, `phone`, `address`, `email` FROM `customers`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no customers data'];
	}

}


/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/

if (isset($_POST["GET_CUSTOMERS"])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	
}

// if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
// 		$c = new Customers();
// 		echo json_encode($c->getCustomersOrder());
// 		exit();
	
// }


?>