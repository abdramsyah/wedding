<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Invitation</title>
</head>

<body>
    <ul id="saic-container-comment-18745"
        class="saic-container-comments saic-order-DESC saic-has-4-comments saic-multiple-comments"
        data-order="DESC" style="display: block;">

        <?php
        // Konfigurasi database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "invitation";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            echo "KONEKSI FAILED " . $conn->error;
            exit();
            die("Koneksi gagal: " . $conn->connect_error);
        }
        echo "KONEKSI SUCCESS " . $conn->error;
        exit();

        // Query untuk mengambil data dari tabel user
        $query = "SELECT * FROM user";
        $result = $conn->query($query);

        // Periksa apakah query berhasil
        if ($result === false) {
            echo "Error pada query: " . $conn->error;
        } else {
            echo "DATA ADA ";

            // Periksa apakah ada data

            if ($result->num_rows > 0) {
                // Iterasi data dan tampilkan
                while ($row = $result->fetch_assoc()) {
                    echo "TEST " . $row['id'];
                    // exit();
        ?>

        <?php
                }
            } else {
                echo "<p>Tidak ada data yang ditemukan.</p>";
            }
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </ul>
</body>

</html>