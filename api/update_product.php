<?php
header('Content-Type: application/json');
include 'db.php';

$conn = getDB();
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];

$sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Product updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $sql . "\n" . $conn->error]);
}

$conn->close();
?>
