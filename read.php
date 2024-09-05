<?php
include 'db.php';

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Created_at']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Updated_at']) . "</td>";
    echo "<td>
            <form action='update.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='" . htmlspecialchars($row['Id']) . "'>
                <input type='submit' value='Edit'>
            </form>
            <form action='delete.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='" . htmlspecialchars($row['Id']) . "'>
                <input type='submit' value='Delete' onclick=\"return confirm('Are you sure you want to delete this item?');\">
            </form>
          </td>";
    echo "</tr>";
}
?>