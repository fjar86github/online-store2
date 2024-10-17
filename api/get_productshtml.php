<?php
// URL JSON
$jsonUrl = 'https://sturdy-acorn-497757gjqg537vrx-8080.app.github.dev/api/get_products.php'; // Ganti dengan URL JSON yang sesuai

// Mengunduh JSON dari URL
$jsonString = file_get_contents($jsonUrl);

// Memeriksa apakah pengunduhan berhasil
if ($jsonString === false) {
    die('Error fetching JSON from the URL');
}

// Mengonversi JSON menjadi array asosiatif
$record = json_decode($jsonString, true);

// Memeriksa apakah konversi berhasil
if (json_last_error() === JSON_ERROR_NONE) {
    // Menampilkan record
    foreach ($record as $key => $value) {
        echo ucfirst($key) . ": " . $value . "\n";
    }
} else {
    echo "Error decoding JSON: " . json_last_error_msg();
}
?>
