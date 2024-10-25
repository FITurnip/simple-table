<?php
// Database connection settings
$servername = "localhost"; 
$username = "aspraklabjarkom"; 
$password = ""; 
$dbname = "content_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch contents from the database
$sql = "SELECT id, content FROM contents";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Table</title>
</head>
<body>
    <h1>Submit Content</h1>
    <form action="./content.php" method="post">
        <label for="content">Content</label>
        <input type="text" name="content" id="content" required>
        <input type="submit" value="Submit">
    </form>

    <table border="1">
        <tr>
            <th>No.</th>
            <th>Content</th>
        </tr>
        <?php
        // Display the contents
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No content submitted yet.</td></tr>";
        }

        ?>
    </table>
</body>
</html>
