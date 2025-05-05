<?php
$servername = "localhost";
$username = "yousabte_workspace";
$password = "kD[asKgc%ydC";
$dbname = "yousabte_workspace";
$coustmer_id=$_GET['coustmer_id'];

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO messages (name, email, phone,message)
VALUES ('$name', '$email', '$phone','$message')";

if ($conn->query($sql) === true) {
  header("location:https://yousab-tech.com/orangestore/PHP/Home.php"); 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>