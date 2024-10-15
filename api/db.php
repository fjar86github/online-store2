<?php
function getDB() {
    $dbhost = 'db';  // Nama service database dalam Docker Compose
    $dbuser = 'store_user';  // Ganti dengan username database Anda
    $dbpass = 'password123';  // Ganti dengan password database Anda
    $dbname = 'online_store';  // Ganti dengan nama database Anda

    $dbConnection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($dbConnection->connect_error) {
        die("Connection failed: " . $dbConnection->connect_error);
    }
    return $dbConnection;
}
?>
