<?php
$host = 'localhost';
$user = 'root'; //Default XAMPP MySQL user
$pass = '';     //Default XAMPP MySQL password (empty by default)
$dbname = 'baldonadocrud';
    
$conn = new mysqli($host, $user, $pass, $dbname,);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>