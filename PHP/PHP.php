


<?php



$servername = "localhost";
$username = "yousabte_orange";
$password = "5w~TzZ*VgtZD";
$dbname = "yousabte_orange";


$Email=$_POST["Email"];
$First_Name=$_POST["First_Name"];
$Last_Name=$_POST["Last_Name"];
$password2=$_POST["My_Password"];
$Confirm_Passwors=$_POST["Confirm_Password"];

try{

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Creataccount (Email, First_Name, Last_Name,My_Password,Confirm_Password)
VALUES ('$Email', '$First_Name', '$Last_Name','$password2','$Confirm_Passwors')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
} catch (PDOException $e) {
  echo "PDOException: " . $e->getMessage();
}


?>