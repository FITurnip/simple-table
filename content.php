<?php
// Database connection settings
$servername = "localhost"; // or your server name
$username = "aspraklabjarkom"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "content_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['content'])) {
    // Sanitize the input
    $content = htmlspecialchars(trim($_POST['content']));
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contents (content) VALUES (?)");
    $stmt->bind_param("s", $content);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Success, you can redirect or do something here
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect back to 
header("Location: ./");
exit();