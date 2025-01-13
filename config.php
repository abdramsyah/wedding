<?php
// Sambungkan ke database
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "invitation";

$servername = "103.77.106.66";
$username = "thewedd1_userabdramsyah";
$password = "thewedd1_invitation";
$dbname = "thewedd1_invitation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$dear = isset($_GET['to']) ? $_GET['to'] : (
    isset($_GET['dear']) ? $_GET['dear'] : (
        isset($_GET['kepada']) ? $_GET['kepada'] : 'Nama Tamu'
    )
);

// Jika parameter kosong atau hanya whitespace, gunakan default
$dear = trim($dear) !== '' ? $dear : 'Nama Tamu';

$count_ucapan = "SELECT COUNT(*) AS total FROM event_attendance";

// Eksekusi query
$result = $conn->query($count_ucapan);

// Validasi hasil query
if ($result) {
    // Ambil hasil query
    $row = $result->fetch_assoc();
    $totalUcapan = $row['total'];
} else {
    // Jika query gagal
    $totalUcapan = "0";
}
