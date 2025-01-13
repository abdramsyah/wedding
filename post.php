<?php
// Konfigurasi koneksi database
$servername = "103.77.106.66";
$username = "thewedd1_userabdramsyah";
$password = "thewedd1_invitation";
$dbname = "thewedd1_invitation";


// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $author = isset($_POST['author']) ? $conn->real_escape_string($_POST['author']) : '';
    $attendance = isset($_POST['attendance']) ? $conn->real_escape_string($_POST['attendance']) : '';
    $guest = isset($_POST['guest']) ? $conn->real_escape_string($_POST['guest']) : '';
    $comment = isset($_POST['comment']) ? $conn->real_escape_string($_POST['comment']) : '';

    // Validasi data
    $errors = [];

    if (empty($author)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if (empty($attendance)) {
        $errors[] = "Konfirmasi kehadiran harus dipilih.";
    }

    if ($attendance === 'present' && empty($guest)) {
        $errors[] = "Jumlah tamu harus dipilih jika Anda hadir.";
    }

    if (empty($comment) || strlen($comment) < 2) {
        $errors[] = "Ucapan harus memiliki minimal 2 karakter.";
    }

    // Jika ada error, tampilkan pesan
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        exit;
    }

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO comments (author, attendance, guest, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $author, $attendance, $guest, $comment);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Data berhasil disimpan. Terima kasih atas konfirmasinya!</p>";
    } else {
        echo "<p style='color: red;'>Terjadi kesalahan: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
