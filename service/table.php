<?php
require_once 'database.php';

$queries = [
    "CREATE TABLE IF NOT EXISTS akun (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        is_admin BOOLEAN DEFAULT false
    )",
    "CREATE TABLE IF NOT EXISTS pengaduan (
        id_pengaduan INT AUTO_INCREMENT PRIMARY KEY,
        isi_laporan TEXT NOT NULL,
        tgl_pengaduan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        akun_id INT,
        FOREIGN KEY (akun_id) REFERENCES akun(id)
    )",
];
foreach ($queries as $query) {
    if (mysqli_query($connection, $query)) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . mysqli_error($connection);
    }
}
