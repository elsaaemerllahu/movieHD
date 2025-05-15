<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "moviehd";  // Emri i databazës

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Lidhja me databazën dështoi: " . $conn->connect_error);
}
?>
