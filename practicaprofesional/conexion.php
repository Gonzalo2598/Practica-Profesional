<?php 
$servername = "localhost";
$database = "agenda";
$username = "root";
$password = "rootroot";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$conn -> set_charset("utf8");

if ($conn) {
	echo "Conectado";
}else{
	echo "No conectado";
}

 ?>