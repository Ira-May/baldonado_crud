<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST ['quantity'];
    
    $sql = "INSERT INTO items (Name, Description, Price, Quantity) VALUES ('$name', '$description', $price, $quantity)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: index.php");
}
?>
