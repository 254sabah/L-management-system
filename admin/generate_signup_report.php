<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count signups per day
$sql = "SELECT DATE(signup_date) AS signup_day, COUNT(*) AS signup_count 
        FROM users 
        GROUP BY DATE(signup_date) 
        ORDER BY signup_day DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the report in HTML table format
    echo "<h2>Signup Report</h2>";
    echo "<table border='1'>
            <tr>
                <th>Date</th>
                <th>Signups Count</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['signup_day'] . "</td>
                <td>" . $row['signup_count'] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No signups found.";
}

$conn->close();
?>
