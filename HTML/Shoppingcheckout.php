<?php
require_once "pdo.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>ORANGE MARKET</title>
 <link rel="icon" href="../images/icon2.jpg" />
 <link rel='stylesheet'href ='../css/bootstrap.css'/>
        <link rel='stylesheet'href ='../css/font-awesome.min.css'/>
        <link rel='stylesheet'href ='../css/style.css'/>
        <link rel='stylesheet'href='../css/media.css'/>
        <link rel='stylesheet'href='../css/animate.css'/>

</head>


<body>


<!-- start nav bar  -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

          <div class="navbar-header">
             
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navtest" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
      
            <!-- logo  -->
            <a class="navbar-brand" href="#"> Orange<span>Market</span></a>
          </div>
      
  
          <div class="collapse navbar-collapse" id="navtest">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="../PHP/Home.php">Home </a></li>
                      
                      <!-- <li  class=""><a href="../HTML/Shoppingcart.php">Shoping Cart <span class="sr-only">(current)</span></a></li> -->
					  <!-- <li  class="active"><a href="../HTML/Shoppingcheckout.php">Checkout <span class="sr-only">(current)</span></a></li> -->

                      
                      <li class="dropdown">
                        <a href="../HTML/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../HTML/Mobiles.php">Mobiles</a></li>
                            <li><a href="../HTML/Accessories.php">Accessories</a></li>
                            <li><a href="../HTML/Routers.php">Routers</a></li>
                         
                  
      
      
                        </ul>
                    </li>
                     <li><a href="../HTML/Find us.php">Find Us</a></li>
                       
                        
                      
                    </ul>
            
          </div>
        </div>
      </nav>
      
      <!-- end navbar -->

<!-- start price table -->
<section class="price_table text-center">
	<div class="container">
		<h1> Our Amazing <span>PRICES</span> & <span>OFFERS</span></h1>
		<div class="row">


		<?php
$id=$_GET['coustmer_id'];
$stmt = $pdo->query("SELECT id, Price_disc,name, Price,description FROM items where id in (select product_id from checkout where coustmer_id=$id) ");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {


?>

				<div class="col-md-4 col-sm-6 col-xm-12">
					<div class="price_box wow fadeInUp" data-wow-duration="2s" data-wow-offset="200">
						<div class="img">
							<img id=<?php echo number_format($row['id']);?>  class="center-block" src="../images/cart/<?php  echo $row['name'];?>" alt="img">
						</div>
						<ul class="info list-unstyled">
							<li >EGP <?php  echo number_format($row['Price_disc'], 2);?></li>
							<li class="right-text">EGP <?php  echo number_format($row['Price'], 2);?></li>
							<br>
							<li class=""> <?php  echo $row['description'];?></li>

							
							
								
						</ul>
					</div>	
				</div>
				
			

			<?php

		}
		?>

			
			
			
			
	

		</div>
		
	</div>
	
</section>

<!-- End price table -->


<!-- start Footer -->
<section class="footer">
	<div class="container">
		<div class="row ">
			<div class="col-lg-6">
				<h2>Site Map</h2>
				<ul class="list-unstyled threecol ">
					<li>Home</li>
					<li>Shop</li>
					<li>categories</li>
					<li>Dresses & Jump Suites</li>
					<li>Out Wear</li>
					<li>Tops & Kintwear</li>
					<li>Skirts & Trousers</li>
					<li>Accessories</li>
					<li>Perfumes</li>
					<li>Find Us</li>
					<li>Contact Us</li>

				</ul>
			</div>
			<div class="col-lg-6">
				<h2>Follow us </h2>
				<ul class="list-unstyled icons">
					<li> <i class="fa fa-facebook fa-5x " aria-hidden="true"></i></li>
					 <li><i class="fa fa-instagram fa-5x" aria-hidden="true"></i></li>
					<li> <i class="fa fa-pinterest fa-5x" aria-hidden="true"></i></li>
					<li><i class="fa fa-youtube-play fa-5x" aria-hidden="true"></i></li>
				</ul>
			</div>
			
		</div>
		
	</div>

	<div class="copyright text-center">
                   Copyright&copy;2019 <span>Orange Market</span>.Egypt
            </div>
        </section>
        <!-- End Footer -->


 <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/wow.min.js"></script>
        <script>new WOW().init();</script>

</body>
</html>﻿