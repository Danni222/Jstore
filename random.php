<?php
include_once"connect.php";

$sqln="UPDATE products_creation SET quantity=90 WHERE id=2";
	$stmt = $conn->prepare($sqln);
	$stmt->execute();


$sql2 = "SELECT * FROM products_creation WHERE id=2";
	$result2=$conn->query($sql2);
	$row2 = $result2->fetchAll();
	$oldquantity = $row2[0]['quantity'];
	echo "$oldquantity" ;	
?>