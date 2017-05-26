<?php
include_once "connect.php";
session_start();
?>

 <?php
       if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="SELECT * FROM products_creation WHERE id=$id";
		$result=$conn->query($sql);
		$row=$result->fetchAll();
		$selectq=$_POST['quantity'];
		$inventoryq=$row[0]['quantity'];
		$exist=false;
		$i=0;
		if(!isset($_SESSION["cart_array"])||count($_SESSION["cart_array"])<1){
			//if it is empty, create a new item in shopping cart. it is multidimentional array
			$_SESSION["cart_array"]=array(0=>array("item_id"=>$id,"quantity"=>$selectq));
					}else{
		     //The cart has at lease one item in it
		      foreach($_SESSION["cart_array"] as $item){
			$i++;
			foreach($item as $x=>$x_value){
				//if the item is in cart, so change the current item's quantity
			  	if($x=="item_id"&& $x_value==$id){
					array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id" => $id, "quantity" => $item['quantity'] + $selectq)));
					$exist=true;
					//echo "<p>".$item['quantity']."</p>";
			     }//end if condition
			  }//end internal for loop
			}//end outside for loop
			  //if it is a new product
			  if($exist==false){
				 array_push($_SESSION["cart_array"], array("item_id" => $id, "quantity" => $selectq));
			}
		     }//end else condition

		    header("location:cart.php");
	}
?>
<?php 
//to empty their shopping cart
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>


<?php
//edit quantity
if (isset($_POST['edititem']) && $_POST['edititem'] != "") {
    
	$edititem = $_POST['edititem'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity);
	$sql="SELECT * FROM products_creation WHERE id=$edititem";
	$result=$conn->query($sql);
	$row=$result->fetchAll();

	$ivenquantity=$row[0]['quantity'];
	if ($quantity < 1 && $quantity == 0) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	if($quantity>$ivenquantity){ $quantity = $ivenquantity; }


	//print_r ($_SESSION["cart_array"][0]);
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $edititem ) {
				
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $edititem, "quantity" => $quantity)));
					  
				  } // close if condition
		      } // close while loop
	} // close foreach loop

	header("location: cart.php");
}
?>
<?php
	if(isset($_POST['arrindex'])){
		$arrin=$_POST['arrindex'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$arrin"]);
			sort($_SESSION["cart_array"]);
		}

	}

?>
<?php 
// Section 5  (render the cart for the user to view on the page)
$cartOutput="";
$total="";
$checkoutbtn="";
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
    
	 $checkoutbtn.= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
    		<input type="hidden" name="business" value="sand222seller@gmail.com">';

	$i = 0; 

    foreach ($_SESSION["cart_array"] as $each_item) { 
		
		$proid=$each_item['item_id'];
		$remove="'";
		$t=str_replace($remove,"",$proid);
		$sql="SELECT * FROM products_creation WHERE id=$t";
		$result=$conn->query($sql);
		foreach($result as $row){
			$name=$row['title'];
			$unitprice=$row['price'];
			$img=$row['image'];

		}
		$x = $i + 1;
		$checkoutbtn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $name . '">
        			<input type="hidden" name="amount_' . $x . '" value="' . $unitprice. '">
        			<input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
		// Create the product array variable
		$product_id_array .= "$t-".$each_item['quantity'].","; 
		//create table row
		$cartOutput.="<tr>";
		$cartOutput.="<td><img src=\"".$img."\" width=\"120\" hight=\"160\"><a href=\"detail.php?id=$t\">".$name."</a></td>";
		$cartOutput.="<td>$".$unitprice."</td>";
		$cartOutput.='<td><form action="cart.php" method="post">
		<input name="quantity" type="text" value="'.$each_item['quantity'].'" size="4" maxlength="2"><br>
		<input name="adjustBtn' . $t . '" type="submit" value="Edit" class="btn btn-primary">
		<input name="edititem" type="hidden" value="' . $t . '">
		</form></td>';
		$eachtotal=$unitprice*$each_item['quantity'];
		$cartOutput.="<td>$".$eachtotal."</td>";
		$cartOutput.='<td><form action="cart.php" method="post"><input name="deleteBtn' . $t . '" type="submit" value="Remove" class="btn btn-primary"><input name="arrindex" type="hidden" value="' . $i . '" ></form></td>';
		$cartOutput.="</tr>";
		
		$total+=$eachtotal;
		$i++;
		
	}
$checkoutbtn .='<input type="hidden" name="custom" value="' . $product_id_array . '">
		<input type="hidden" name="currency_code" value="USD" />
    		<input type="hidden" name="lc" value="US" />
    		<input type="hidden" name="rm" value="2" />
    		<input type="hidden" name="return" value="http://107.170.90.127/Jstore/products.php" />
    		<input type="hidden" name="cancel_return" value="http://107.170.90.127/Jstore/cart.php" />
   		<input type="hidden" name="notify_url" value="http://107.170.90.127/Jstore/ppipnt.php" />
		<input type="hidden" name="cbt" value="Return to The Store">
    		<input type="hidden" name="charset" value="utf-8" />
		<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
   </form>';



}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style>
table {
    border-collapse: collapse;
}

th, tr {
    padding: 20px;
    text-align: center;
}


th {
    background-color: #1E90FF;
    color: white;
    font-family: "Trebuchet MS", Arial, Verdana;
    font-size:23px;
    padding: 5px;
    border-bottom-width: 1px;
}
td{
    font-family: "Trebuchet MS", Arial, Verdana;
    font-size:20px;
    padding: 5px;
    border-bottom-width: 1px;	

}
</style>
</head>
<body>

   <?php include_once "nav.php"?>
	<div class="container">
	<div class="row">
	<div class="box">


<table align="center" width="90%" border="1" cellspacing="0" cellpadding="6">
      <tr>
        <th >Product</th>
        <th >Unit Price</th>
        <th >Quantity</th>
        <th >Total</th>
        <th >Remove</th>
      </tr>
	 <?php echo $cartOutput;
		echo $product_id_array[0];?>
    </table>
	<br><br>
        <div class="row">
	<div class="col-lg-10">

	 <?php echo "<p align=\"right\">Total: $".$total."</p>"?><br>
        </div>
	<div class="col-lg-4">
       </div></div>
	<br><br>
	<div class="row">
	<div class="col-lg-12 text-center">
	<?php echo $checkoutbtn; ?><br>
	 <a href="cart.php?cmd=emptycart">Delete All Items|</a>
	 <a href="products.php">Continue Shopping</a>

	</div>
	</div></div></div>
     

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Jstore Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
