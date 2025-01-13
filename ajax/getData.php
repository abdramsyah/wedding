<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invitation";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Query untuk mengambil data dari tabel user
$query = "SELECT * FROM user";
$result = $conn->query($query);

$data = array();

// Ambil data dari hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

echo json_encode($data);