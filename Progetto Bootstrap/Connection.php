<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dbfinale";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dbfinale";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
>>>>>>> e0afe090243f63ce5f8aaec2abdb1096345b14e9
?>