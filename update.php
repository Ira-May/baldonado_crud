<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE items SET Name='$name', Description='$description', Price=$price, Quantity=$quantity WHERE Id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: index.php");
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE Id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Item</title>
    </head>
    <body>
        <h1>Update Item</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['Id']); ?>">
            <input type="text" name="name" value="<?php echo htmlspecialchars($row['Name']); ?>" required>
            <textarea name="description"><?php echo htmlspecialchars($row['Description']); ?></textarea>
            <input type="number" name="price" value="<?php echo htmlspecialchars($row['Price']); ?>" step="0.01" required>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($row['Quantity']); ?>" required>
            <input type="submit" name="update" value="Update Item">
        </form>
    </body>
    </html>
    <?php
}
?>
