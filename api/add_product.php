<?php
header('Content-Type: application/json');
include 'db.php';

$conn = getDB();
$name = $_POST['name'];
$price = $_POST['price'];

$sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Product added successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $sql . "\n" . $conn->error]);
}

$conn->close();
?>
