<?php
header('Content-Type: application/json');
include 'db.php';

$conn = getDB();
$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Product deleted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $sql . "\n" . $conn->error]);
}

$conn->close();
?>
