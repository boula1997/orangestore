<?php
require_once "pdo.php";
session_start();

if (!isset($_GET['product_id'])) {
    die("Product ID not specified.");
}

$product_id = (int) $_GET['product_id'];

$stmt = $pdo->prepare("
    SELECT 
        p.id, p.price, p.price_bd, p.icon, p.generation, p.hdd, p.processor, p.ram, 
        p.screenCard, p.ssd, pt.title, pt.description,
        f.url AS image
    FROM products p
    JOIN product_translations pt ON p.id = pt.product_id AND pt.locale = 'en'
    LEFT JOIN files f ON f.fileable_id = p.id AND f.fileable_type = 'App\\\\Models\\\\Product'
    WHERE p.id = ?
    LIMIT 1
");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$product) {
    die("Product not found.");
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laptop Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo.png" />
    <link rel='stylesheet' href='../css/bootstrap.css' />
    <link rel='stylesheet' href='../css/font-awesome.min.css' />
    <link rel='stylesheet' href='../css/style.css' />
    <link rel='stylesheet' href='../css/media.css' />
    <link rel='stylesheet' href='../css/animate.css' />
    <link rel='stylesheet' href='../css/pages.css' />
</head>

<body>

<!-- Navbar -->
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
				<a class="" href="Home.php">  <img src="../images/logo.png" alt="Laptops Market Logo" class="logo">
				</a>
        </div>
        <div class="collapse navbar-collapse" id="navtest">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="../PHP/Home.php">Home</a></li>
                <li><a href="../HTML/Find us.php">Find Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Banner -->
<!-- <div class="homepage-block-full-width">
    <img class="homepage-banner" src="../images/04.jpg" alt="Laptop Store Banner" style="width: 100%; height: auto;">
</div> -->

<!-- Product Details -->
<section class="container laptop-details" style="margin: 50px auto;">
<style>
    .fixed-img {
        width: 100%;
        object-fit: cover;
		height: 300px;
    }
</style>
<div class="row">
    <div class="col-md-5">
        <img id="productImage" 
             src="<?php echo "https://yousab-tech.com/workspace/public/" . $product['image']; ?>" 
             alt="<?= htmlspecialchars($product['title']) ?>" 
             class="img-thumbnail fixed-img">
    </div>
    <div class="col-md-7 mt-2">
        <table id="productTable" class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
                <tr><th>Feature</th><th>Detail</th></tr>
            </thead>
            <tbody>
    <tr><td>Processor</td><td><?= htmlspecialchars($product['processor']) ?></td></tr>
    <tr><td>RAM</td><td><?= htmlspecialchars($product['ram']) ?> GB</td></tr>
    <tr><td>HDD</td><td><?= htmlspecialchars($product['hdd']) ?> GB</td></tr>
    <tr><td>SSD</td><td><?= htmlspecialchars($product['ssd']) ?> GB</td></tr>
    <tr><td>Screen Card</td><td><?= htmlspecialchars($product['screenCard']) ?></td></tr>
    <tr><td>Generation</td><td><?= htmlspecialchars($product['generation']) ?></td></tr>
    <tr><td>Price (LE)</td><td><?= htmlspecialchars($product['price']) ?></td></tr>
    <!-- <tr><td>Price (BD)</td><td><?= htmlspecialchars($product['price_bd']) ?></td></tr> -->
</tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Match image height to the table height
        const tableHeight = $('#productTable').outerHeight();
        $('#productImage').height(tableHeight);
    });

    // Optional: handle resize
    $(window).on('resize', function () {
        const tableHeight = $('#productTable').outerHeight();
        $('#productImage').height(tableHeight);
    });
</script>


    <div class="row">
        <div class="col-md-12">
		<!-- <h2 class="text-primary"><?= htmlspecialchars($product['title']) ?></h2> -->
		<p class="lead"><?= $product['description'] ?></p>
        </div>

    </div>
</section>

<!-- Footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Site Map</h2>
                <ul class="list-unstyled threecol">
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
                <h2>Follow us</h2>
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

<a href="https://wa.me/201126785910" target="_blank" class="whatsapp-float">
  <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp" />
</a>

<!-- JS Scripts -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>

</body>
</html>
