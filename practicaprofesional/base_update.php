<?php
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "agenda";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>