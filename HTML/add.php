

<?php
require_once "pdo.php";

$coustmer_id=$_GET['coustmer_id'];
$product_id=$_GET['product_id'];







$stmt = $pdo->query("INSERT INTO `pruchaces`(`coustmer_id`, `product_id`) VALUES ('$coustmer_id','$product_id')");
header("location:http://localhost/Orange/HTML/Shoppingcart.php?coustmer_id=".$coustmer_id);


?>