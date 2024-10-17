<?php
// URL untuk mengambil data JSON
$url = 'https://sturdy-acorn-497757gjqg537vrx-8080.app.github.dev/api/get_products.php';

// Mengambil data JSON dari URL
$jsonData = file_get_contents($url);

// Memeriksa apakah data berhasil diambil
if ($jsonData === false) {
    die('Error fetching data from the API.');
}

// Decode JSON data to PHP array
$data = json_decode($jsonData, true);

// Memeriksa apakah decoding berhasil
if ($data === null) {
    die('Error decoding JSON data.');
}

// Start HTML table
echo '<table border="1" style="width: 100%; border-collapse: collapse;">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Price</th>';
echo '<th>Created At</th>';
echo '<th>Updated At</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Loop through the data and output each row
foreach ($data as $item) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($item['id']) . '</td>';
    echo '<td>' . htmlspecialchars($item['name']) . '</td>';
    echo '<td>' . htmlspecialchars($item['price']) . '</td>';
    echo '<td>' . htmlspecialchars($item['created_at']) . '</td>';
    echo '<td>' . htmlspecialchars($item['updated_at']) . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
?>
