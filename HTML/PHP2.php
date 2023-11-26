<?php
require_once "pdo.php";

try{

	$Email=$_POST["Email"];
	$Password2=$_POST["My_Password"];

	
$stmt = $pdo->query("SELECT * FROM creataccount WHERE Email='$Email' AND My_Password='$Password2'");
if($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo $row['id'];
header("location:https://yousab-tech.com/orangestore/Home.php?coustmer_id=".$row['id']);}
else
die("your password don't match with your Email"); 

 } catch (Exception $e) {
	echo "PDOException: " . $e->getMessage();
 }
			

		



?>