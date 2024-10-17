<?php
// URL JSON
$jsonUrl = 'https://api.example.com/data'; // Ganti dengan URL JSON yang sesuai

// Inisialisasi cURL
$ch = curl_init($jsonUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Mengunduh JSON
$jsonString = curl_exec($ch);

// Memeriksa apakah pengunduhan berhasil
if ($jsonString === false) {
    die('Error fetching JSON: ' . curl_error($ch));
}

// Menutup cURL
curl_close($ch);

// Menampilkan data mentah JSON untuk debug
// echo $jsonString; // Uncomment untuk melihat JSON yang diterima

// Mengonversi JSON menjadi array asosiatif
$records = json_decode($jsonString, true);

// Memeriksa apakah konversi berhasil
if (json_last_error() === JSON_ERROR_NONE) {
    // Menampilkan setiap record
    foreach ($records as $record) {
        echo "ID: " . $record['id'] . "\n";
        echo "Name: " . $record['name'] . "\n";
        echo "Price: " . $record['price'] . "\n";
        echo "Created At: " . $record['created_at'] . "\n";
        echo "Updated At: " . $record['updated_at'] . "\n";
        echo "--------------------------\n"; // Separator untuk readability
    }
} else {
    // Menampilkan pesan kesalahan jika terjadi kesalahan saat mendekode JSON
    echo "Error decoding JSON: " . json_last_error_msg() . "\n";
    echo "Raw JSON data: " . $jsonString . "\n"; // Tampilkan data mentah untuk analisis
}
?>
