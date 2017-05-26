<?php

$servername = "107.170.90.127:3306";
$username = "root";
$password = "l66412132";


try {
    $conn = new PDO('mysql:host=localhost;dbname=Ecommerce', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
