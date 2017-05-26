<?php
include_once "connect.php";
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<body>

   <?php include_once "nav.php"?>

     <?php
	$id=$_GET['id'];
	$sql="SELECT * FROM products_creation WHERE id=$id";
	$result=$conn->query($sql);
	$row=$result->fetchAll();
	if($row[0]['status']==1){
		$title=$row[0]['title'];
		$price=$row[0]['price'];
		$quantity=$row[0]['quantity'];
		$tag=$row[0]['tag'];
		$image=$row[0]['image'];
	}
?>
   <div class="container">

       <div class="row">
            <div class="box">

   <?php echo "<form method='POST' action='http://107.170.90.127/Jstore/cart.php?id=".$id."' enctype='multipart/form-data'>"?>

   <div class="col-md-6">
   	<?php echo"<img class=\"img-responsive\" src=\"".$image."\" alt=\" \" style=\"width: 450px; height: 450px\">"; ?>                                  
   </div>
   <div class="col-md-6">
   <?php echo" <h2>".$title."</h2>";?>
   	<div class="row">
 	<div class="col-md-12">
  		<?php echo"<span class=\"label label-primary\">No. ".$id."</span>";?>
  		<span class="monospaced"></span>
 	</div>
	</div><!-- end row -->

   <div class="row">
   	<div class="col-md-12">
   		<p></p>
   		<?php echo"<h4 class=\"description\">".$tag." </h4>";?>
   	</div>
   </div><!-- end row -->

   <div class="row">
 	<div class="col-md-12 bottom-rule">
  	 <?php echo"<h2>".$price."$</h2>";?>
   </div>
  </div><!-- end row -->

<p></p>
   <div class="row">
 	<div class="col-md-8 product-qty">
        <p></p>
	<?php echo"<p class=\"lead\"><strong>Inventory: </strong> ".$quantity."</p>";?>
   </div></div>
   <div class="row">
 	<div class="col-md-8 product-qty">
        <p></p>
	<input type=number name="quantity" min="1" max="20" value="1">
   </div>
   <div class="col-md-4">
  <input type="submit" name="submit" class="btn btn-md btn-danger" value="ADD TO CART">  
</div>
</div><!-- end row -->

</div></div></div></div>

</form>


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
