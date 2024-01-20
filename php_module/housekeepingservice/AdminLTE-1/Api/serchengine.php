<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}


$date = $_GET['date'];
$name = $_GET['name'];

// Build the SQL query based on the provided inputs
$sql = "SELECT * FROM booking WHERE (title LIKE '%$query%' OR content LIKE '%$query%')";

if (!empty($date)) {
    $sql .= " AND date_column = '$date'";
}

if (!empty($name)) {
    $sql .= " AND name_column LIKE '%$name%'";
}

$result = mysqli_query($connection, $sql);

// Display search results
echo "<h2>Search Results:</h2>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>{$row['title']}</h3>";
    echo "<p>{$row['content']}</p>";
}
?>


