<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Create
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        $sql = "INSERT INTO items (Name, Description, Price, Quantity) VALUES ('$name', '$description', $price, $quantity)";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        // Update
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        $sql = "UPDATE items SET Name='$name', Description='$description', Price=$price, Quantity=$quantity WHERE Id=$id";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        // Delete
        $id = $_POST['id'];
        
        $sql = "DELETE FROM items WHERE Id=$id";
        $conn->query($sql);
    }
}

$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baldonado CRUD</title>
</head>
<body>
    <h1>Baldonado CRUD</h1>

    <!-- Create Form -->
    <h2>Add New Item</h2>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="price" step="0.01" placeholder="Price" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="submit" name="create" value="Add Item">
    </form>

    <!-- Display Items -->
    <h2>Items List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Created_at']; ?></td>
                <td><?php echo $row['Updated_at']; ?></td>
                <td>
                    <!-- Edit Form -->
                    <form action="index.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['Name']; ?>" required>
                        <textarea name="description"><?php echo $row['Description']; ?></textarea>
                        <input type="number" name="price" value="<?php echo $row['Price']; ?>" step="0.01" required>
                        <input type="number" name="quantity" value="<?php echo $row['Quantity']; ?>" required>
                        <input type="submit" name="update" value="Update">
                    </form>
                    <!-- Delete Form -->
                    <form action="index.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure?');">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

