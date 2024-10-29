<?php
$host = 'localhost';          // Your host
$dbname = 'dynamic_content_db'; // Your database name
$username = 'root';           // Your MAMP username
$password = 'root';           // Your MAMP password
$port = 8889;                 // MAMP's MySQL port

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the `content` table
$sql = "SELECT id, title, body, created_at FROM content"; // Adjust the column names as per your table
$result = $conn->query($sql);

// Check if there are results and display them
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";  // Display title
        echo "<p>" . $row["body"] . "</p>";    // Display body content
        echo "<small>Posted on " . $row["created_at"] . "</small><hr>"; // Display creation date
    }
} else {
    echo "No content found.";
}

// Close the connection
$conn->close();
?>
