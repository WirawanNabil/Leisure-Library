<?php
// Connect to your database (update with your credentials)
$host = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$database = "your_database_name";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display data in a table
function displayTableData($conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['book_id'] . "</td>";
            echo "<td>" . $row['book_title'] . "</td>";
            echo "<td>" . $row['sid'] . "</td>";
            echo "<td>" . $row['borrower'] . "</td>";
            echo "<td>" . $row['borrow_date'] . "</td>";
            echo "<td>" . $row['return_date'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }
}

// Close the database connection
$conn->close();
?>
