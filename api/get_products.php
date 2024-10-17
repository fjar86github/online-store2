<?php
header('Content-Type: application/json');
include 'db.php';

$conn = getDB();
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Menginisialisasi array untuk menyimpan data produk
$response = [
    'status' => 'success',
    'data' => [],
    'message' => 'Products retrieved successfully.'
];

// Memeriksa apakah ada hasil yang ditemukan
if ($result->num_rows > 0) {
    // Mengambil setiap produk dan menambahkannya ke array data
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ];
    }
} else {
    // Jika tidak ada produk, ubah status dan pesan
    $response['status'] = 'error';
    $response['message'] = 'No products found.';
}

// Mengencode array menjadi JSON
echo json_encode($response);
$conn->close();
?>
