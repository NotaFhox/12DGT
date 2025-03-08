<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pageSlug = $_GET['page'];
$sql = "SELECT content FROM database WHERE slug = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pageSlug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array('content' => $row['content']));
} else {
    echo json_encode(array('content' => null));
}

$stmt->close();
$conn->close();
?>