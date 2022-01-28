<?php
$servername = "lamp-mysql8";
$database = "pizza_test";
$username = "root";
$password = "tiger";
$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>