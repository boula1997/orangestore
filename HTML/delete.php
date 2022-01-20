

<?php
require_once "pdo.php";

$coustmer_id=$_GET['coustmer_id'];
$product_id=$_GET['product_id'];








$stmt = $pdo->query("DELETE FROM `pruchaces` WHERE coustmer_id=$coustmer_id and product_id=$product_id ");
header("location:http://localhost/Orange/HTML/Shoppingcart.php?coustmer_id=".$coustmer_id);


?>