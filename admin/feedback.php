<?php
// Connect to database (replace with your database credentials)
$conn = new mysqli('localhost', 'root', '', 'safi');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch laundry from database
$sql = "SELECT * FROM laundry";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display each booking
    while ($row = $result->fetch_assoc()) {
        echo '<div>' . $row['laundry_date'] . ': ' . $row['details'] . '</div>';
    }
} else {
    echo 'No laundry found.';
}

$conn->close();
?>
