


<?php



$servername = "localhost";
$username = "yousabte_workspace";
$password = "kD[asKgc%ydC";
$dbname = "yousabte_workspace";
$coustmer_id=$_GET['coustmer_id'];

$User_Name=$_POST["User_Name"];
$Email=$_POST["Email"];
$Cell_Phone=$_POST["Cell_Phone"];
$Comment=$_POST["Comment"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Contactus (User_Name, Email, Cell_Phone,Comment,coustmer_id)
VALUES ('$User_Name', '$Email', '$Cell_Phone','$Comment','$coustmer_id')";

if ($conn->query($sql) === TRUE) {
  header("location:https://yousab-tech.com/orangestore/PHP/Home.php?coustmer_id=".$coustmer_id); 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>