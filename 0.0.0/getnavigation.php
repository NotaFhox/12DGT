<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, slug FROM pages"; // Assuming your table is named 'pages'
$result = $conn->query($sql);

$pages = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pages[] = $row;
    }
}

echo json_encode($pages);

$conn->close();
?>