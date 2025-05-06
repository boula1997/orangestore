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
	<title>Laptops Market</title>
	<link rel="icon" href="../images/logo.png" />
	<link rel='stylesheet' href='../css/bootstrap.css' />
	<link rel='stylesheet' href='../css/font-awesome.min.css' />
	<link rel='stylesheet' href='../css/style.css' />
	<link rel='stylesheet' href='../css/media.css' />
	<link rel='stylesheet' href='../css/animate.css' />
	<link rel='stylesheet' href='../css/pages.css' />
</head>


<body>


	<!-- start nav bar  -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navtest"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- logo  -->
				<a class="navbar-brand" href="Home.php">  <img src="../images/logo.png" alt="Laptops Market Logo" class="logo">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navtest">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="../PHP/Home.php">Home <span class="sr-only">(current)</span></a></li>

					<!-- <li ><a href="../HTML/Shoppingcart.php">Shoping Cart </a></li> -->
					<!-- <li  class=""><a href="../HTML/Shoppingcheckout.php">Checkout <span class="sr-only">(current)</span></a></li> -->
					<!-- <li class="dropdown">
				  <a href="../HTML/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="../HTML/Mobiles.php">Mobiles</a></li>
					<li><a href="../HTML/Accessories.php">Accessories</a></li>
					<li><a href="../HTML/Routers.php">Routers</a></li>
					
				   
			


				  </ul>
			  </li> -->
					<li><a href="../HTML/Find us.php">Find Us</a></li>




				</ul>

			</div>
		</div>
	</nav>

	<!-- end navbar -->
	<!-- start banner image -->
	<div class="homepage-block-full-width">
		<img class="homepage-banner"
			src="../images\electronics-promotional-shopping-sale-computer-gadgets-and-touch-screen-devices-PR0MCY.jpg"
			alt="Laptop Store Banner" style="width: 100%; height: auto;">
	</div>
	<!-- end banner image -->


	<!-- start about us  -->
	<!-- <section class="about text-center wow bounceIn" data-wow-duration="8s" data-wow-offset="300">
		<h1 class="hidden-xs">Meet our new Store <span>Orane Market</span></h1>
		<h3 class="visible-xs">Meet our new Store <span>Orange Market</span></h5>

			<p class="lead">Hello Let me introduce our new Products </p>

	</section> -->

	<!-- End about us  -->

	<!-- start slider -->

	<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			<li data-target="#carousel-example-generic" data-slide-to="3"></li>
			<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			<li data-target="#carousel-example-generic" data-slide-to="5"></li>

		</ol>

		<!-- Wrapper for slides -->

		<div class="carousel-inner" role="listbox">


			<div class="item">
				<img src="../images/00.jpg" alt="...">
				<div class="carousel-caption">

				</div>
			</div>

			<div class="item item">
				<img src="../images/02.jpg" alt="...">
				<div class="carousel-caption">

				</div>
			</div>

			<div class="item">
				<img src="../images/03.jpg" alt="...">
				<div class="carousel-caption">

				</div>
			</div>



			<div class="item">
				<img src="../images/04.jpg" alt="...">
				<div class="carousel-caption">

				</div>
			</div>

			<div class="item">
				<img src="../images/05.jpg" alt="...">
				<div class="carousel-caption">

					<div class="item">
						<img src="../images/06.jpg" alt="...">
						<div class="carousel-caption">

						</div>
					</div>

				</div>
			</div>

		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- end slider -->
	<!-- start price table -->
	<section class="price_table text-center">
		<div class="container">
			<h1> Our Amazing <span>PRICES</span> & <span>OFFERS</span></h1>
			<div class="row">


				<?php

				$stmt = $pdo->query("
    SELECT 
        p.id, 
        p.price, 
        p.price_bd, 
        pt.title, 
        pt.description, 
        f.url as image
    FROM products p
    JOIN product_translations pt ON p.id = pt.product_id
    LEFT JOIN files f ON f.fileable_id = p.id 
        AND f.fileable_type = 'App\\\\Models\\\\Product'
    WHERE pt.locale = 'ar'
    GROUP BY p.id
");
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="col-md-4 col-sm-6 col-xm-12">
						<div class="price_box wow fadeInUp" data-wow-duration="2s" data-wow-offset="200">
							<div class="img">
								<img id=<?php echo number_format($row['id']); ?> class="center-block"
									style="height: 300px !important;"
									src="<?php echo "https://yousab-tech.com/workspace/public/" . $row['image']; ?>"
									alt="img">
							</div>
							<ul class="info list-unstyled">
								<li>EGP <?php echo number_format($row['price'], 2); ?></li>
								<li class="right-text">EGP <?php echo number_format($row['price_bd'], 2); ?></li>
								<br>
								<li class=""> <?php echo $row['pt.description']; ?></li>
								<a href="product.php?product_id=<?php echo number_format($row['id']); ?>">Read Details</a>



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

	<!-- start section contact us -->
	<section class="contact-us text-center">
		<div class="container">
			<div class="row">

				<i class="fa fa-headphones fa-5x"></i>
				<h1>TELL US WHAT YOU FEEL</h1>
				<p class="lead">Feel free to contact us anytime</p>
				<div class="col-md-6 wow bounceInLeft" data-wow-duration="1s" data-wow-offset="300">
					<form action="PHP3.php" method="POST" role="role ">

						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Name" name="name">
						</div>

						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="email" name="email">
						</div>

						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Phone" name="phone">
						</div>


				</div>
				<div class="col-md-6 wow bounceInRight" data-wow-duration="1s" data-wow-offset="300">
					<div class="form-group">
						<textarea class="form-control input-lg" placeholder="Your Message" name="message"></textarea>

					</div>
					<button type="submit" value="submit" class="btn-lg btn-block"> Contact Us</button>
					</form>

				</div>
			</div>
		</div>

	</section>
	<!-- End section contact us -->

	<!-- start Footer -->
	<section class="footer">
		<div class="container">
			<div class="row ">
				<div class="col-lg-6">
					<h2>Site Map</h2>
					<ul class="list-unstyled threecol ">
						<li>Home</li>
						<li>Shoping cart</li>
						<li>categories</li>
						<li>Mobiles & Devices</li>
						<li>Tariff Plans</li>
						<li>Internet</li>
						<li>Offers and promotions</li>
						<li>Handsets and Devices</li>
						<li>Entertainment</li>
						<li>Find Us</li>
						<li>Contact Us</li>

					</ul>
				</div>
				<div class="col-lg-6">
					<h2>Follow us </h2>
					<ul class="list-unstyled icons">
						<li> <i class="fa fa-facebook fa-2x " aria-hidden="true"></i></li>
						<li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
						<li> <i class="fa fa-pinterest fa-2x" aria-hidden="true"></i></li>
						<li><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></li>
					</ul>
				</div>

			</div>

		</div>

		<div class="copyright text-center">
			Copyright&copy;2019 <span>Laptops Market</span>.Egypt
		</div>
	</section>
	<!-- End Footer -->




	<!--  -->




	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/plugins.js"></script>
	<script src="../js/wow.min.js"></script>
	<script>new WOW().init();</script>

</body>

</html>