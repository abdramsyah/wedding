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
            die("Koneksi gagal: " . $conn->connect_error);
        }
        echo "KONEKSI SUCCESS " . $conn->error;



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
                    <li id="saic-item-comment-<?php echo $row['id']; ?>"
                        class="comment even thread-even depth-1 saic-item-comment">

                        <div id="saic-comment-<?php echo $row['id']; ?>" class="saic-comment saic-clearfix">

                            <div class="saic-comment-avatar">
                                <img src="https://ui-avatars.com/api/?background=random&color=random&name=<?php echo urlencode($row['nama_user']); ?>"
                                    class="avatar avatar-28 photo" height="28" width="28" />
                            </div>

                            <div class="saic-comment-content">

                                <div class="saic-comment-info">
                                    <span class="saic-commenter-name"
                                        title="<?php echo htmlspecialchars($row['nama_user']); ?>">
                                        <?php echo htmlspecialchars($row['nama_user']); ?>
                                    </span>
                                </div>

                                <div class="saic-comment-text">
                                    <p>
                                        <?php echo htmlspecialchars($row['messages']); ?>
                                    </p>
                                </div>

                                <div class="saic-comment-time">
                                    <?php echo htmlspecialchars($row['created_at']); ?>
                                </div>
                            </div>

                        </div>
                    </li>
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