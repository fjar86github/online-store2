<?php
// URL JSON (ganti dengan URL yang sesuai jika diambil dari API)
$jsonUrl = 'https://sturdy-acorn-497757gjqg537vrx-8080.app.github.dev/api/get_products.php'; // Ubah sesuai dengan endpoint Anda

// Menggunakan cURL untuk mengambil JSON dari URL
$ch = curl_init($jsonUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jsonString = curl_exec($ch);

// Memeriksa apakah pengunduhan berhasil
if ($jsonString === false) {
    die('Error fetching JSON: ' . curl_error($ch));
}

// Menutup cURL
curl_close($ch);

// Mengonversi JSON menjadi array asosiatif
$response = json_decode($jsonString, true);

// Memeriksa apakah konversi berhasil
if (json_last_error() === JSON_ERROR_NONE) {
    // Menampilkan status dan message
    echo "Status: " . $response['status'] . "\n";
    echo "Message: " . $response['message'] . "\n";
    
    // Memeriksa apakah ada data produk
    if (!empty($response['data'])) {
        // Menampilkan setiap produk
        foreach ($response['data'] as $product) {
            echo "ID: " . $product['id'] . "\n";
            echo "Name: " . $product['name'] . "\n";
            echo "Price: " . $product['price'] . "\n";
            echo "Created At: " . $product['created_at'] . "\n";
            echo "Updated At: " . $product['updated_at'] . "\n";
            echo "--------------------------\n"; // Separator untuk readability
        }
    } else {
        echo "No products available.\n";
    }
} else {
    // Menampilkan pesan kesalahan jika terjadi kesalahan saat mendekode JSON
    echo "Error decoding JSON: " . json_last_error_msg() . "\n";
    echo "Raw JSON data: " . $jsonString . "\n"; // Tampilkan data mentah untuk analisis
}
?>
