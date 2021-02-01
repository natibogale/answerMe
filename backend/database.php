
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "answermenow";

$mysqli = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>