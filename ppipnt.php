<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
 

include_once "connect.php";
// Check number 4 
$product_id_string = $_POST['custom'];
//$product_id_string="1-3";
$product_id_string = rtrim($product_id_string, ","); // remove last comma
// Explode the string, make it an array, then query all the prices out, add them up, and make sure they match the payment_gross amount
$id_str_array = explode(",", $product_id_string); // Uses Comma(,) as delimiter(break point)
$fullAmount = 0;
//$sql = mysql_query("INSERT INTO transactions (payer_email, mc_gross, payer_id,transactionid) 
  // VALUES('asdasj@gmail.com',10.21,'asdasdas212fds',default)") or die ("unable to execute the query");

foreach ($id_str_array as $key => $value) {
    
	$id_quantity_pair = explode("-", $value); // Uses Hyphen(-) as delimiter to separate product ID from its quantity
	$product_id = $id_quantity_pair[0]; // Get the product ID
	$product_quantity = $id_quantity_pair[1]; // Get the quantity
	$sql = "SELECT * FROM products_creation WHERE id='$product_id'";
	$result=$conn->query($sql);
	$row = $result->fetchAll();
	$oldquantity = $row[0]['quantity'];
	$newquantity=$oldquantity-$product_quantity;
	$sqln="UPDATE products_creation SET quantity='$newquantity' WHERE id='$product_id'";
	$stmt=$conn->prepare($sqln);
	$stmt->execute();
	//$sql1=mysql_query("UPDATE products_creation SET  quantity='$newquantity' WHERE id='$product_id'");
//	$sql1=mysql_query("UPDATE products_creation SET quantity='$oldquantity' WHERE id=21");

}
session_destroy();
$conn = null;

?>