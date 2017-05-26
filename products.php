<?php
include_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

   <?php include_once "nav.php"?>


     <!-- Page Content -->
    <div class="container">
        <div class="row">
	<div class="box">

	 <?php
	$sql="SELECT * FROM products_creation";
	$result=$conn->query($sql);
	if($result){
		foreach($result as $row){
			echo "<div class=\"col-sm-4 col-lg-4 col-md-e\">";
			echo "<div class=\"thumbnail\">";
			echo "<img src=\"".$row['image']."\" alt=\"\">";
			echo "<div class=\"caption\">";
			echo "<h4 class=\"pull-right\">".$row['price']."</h4>";
			echo "<h4><a href=\"detail.php?id=".$row['id']."\">".$row['title']."</a></h4>";
			echo "<p>".$row['tag']."</p></div></div></div>";
	}
	}
   ?>


                </div>

            </div></div>

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
