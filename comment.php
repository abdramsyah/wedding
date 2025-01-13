 <?php
    // Query untuk mengambil data dari tabel user
    $query = "SELECT * FROM event_attendance ORDER BY created_at DESC";
    $result = $conn->query($query);

    // Periksa apakah query berhasil
    if ($result === false) {
        echo "Error pada query: " . $conn->error;
    } else {

        // Periksa apakah ada data
        if ($result->num_rows > 0) {
            // Iterasi data dan tampilkan
            while ($row = $result->fetch_assoc()) {
    ?>

             <li id="saic-item-comment-5426"
                 class="comment even thread-even depth-1 saic-item-comment">

                 <div id=" saic-comment-5426" class="saic-comment saic-clearfix">

                     <div class="saic-comment-avatar">

                         <img src="https://ui-avatars.com/api/?background=random&color=random&name=<?php echo urlencode($row['author']); ?>"
                             class="avatar avatar-28 photo" height="28" width="28" />

                     </div>

                     <div class="saic-comment-content">

                         <div class="saic-comment-info">

                             <span class="saic-commenter-name"
                                 title="<?php echo urlencode($row['author']); ?>"><?php echo urlencode($row['author']); ?></span>
                             <?php
                                // Daftar status kehadiran
                                $attendanceStatus = [
                                    'present' => [
                                        'label' => 'hadir',
                                        'icon'  => '<span class="saic-author-mark saic-post-author-present"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" xml:space="preserve" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 20 20">
                                          <path fill="#3d9a62" d="M17.645 8.032c-.294-.307-.599-.625-.714-.903-.106-.256-.112-.679-.118-1.089-.012-.762-.025-1.626-.626-2.227s-1.465-.614-2.227-.626c-.41-.006-.833-.012-1.089-.118-.278-.115-.596-.42-.903-.714-.54-.518-1.152-1.105-1.968-1.105-.816 0-1.428.587-1.968 1.105-.307.294-.625.599-.903.714-.256.106-.679.112-1.089.118-.762.012-1.626.025-2.227.626s-.614 1.465-.626 2.227c-.006.41-.012.833-.118 1.089-.115.278-.42.596-.714.903C1.837 8.572 1.25 9.184 1.25 10c0 .816.587 1.428 1.105 1.968.294.307.599.625.714.903.106.256.112.679.118 1.089.012.762.025 1.626.626 2.227s1.465.614 2.227.626c.41.006.833.012 1.089.118.278.115.596.42.903.714.54.518 1.152 1.105 1.968 1.105.816 0 1.428-.587 1.968-1.105.307-.294.625-.599.903-.714.256-.106.679-.112 1.089-.118.762-.012 1.626-.025 2.227-.626s.614-1.465.626-2.227c.006-.41.012-.833.118-1.089.115-.278.42-.596.714-.903.518-.54 1.105-1.152 1.105-1.968 0-.816-.587-1.428-1.105-1.968Zm-3.343-2.461a.882.882 0 0 0-1.222.256l-4.26 6.509-2.036-1.885a.885.885 0 0 0-1.2 1.297l2.815 2.604c.01.009.023.011.033.02.025.02.04.048.067.067.037.025.08.03.121.048a.86.86 0 0 0 .145.058.817.817 0 0 0 .147.023.883.883 0 0 0 .212-.003.89.89 0 0 0 .086-.02.887.887 0 0 0 .247-.103l.039-.028c.052-.036.108-.062.152-.11.031-.034.045-.078.071-.116l.003-.004 4.835-7.389a.89.89 0 0 0-.255-1.224Z" />
                                        </svg></span>'
                                    ],
                                    'notpresent' => [
                                        'label' => 'tidak hadir',
                                        'icon'  => '<span class="saic-author-mark saic-post-author-notpresent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" xml:space="preserve" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 20 20">
                                          <path fill="#d90a11" d="M17.645 8.032c-.294-.307-.599-.625-.714-.903-.106-.256-.112-.679-.118-1.089-.012-.762-.025-1.626-.626-2.227s-1.465-.614-2.227-.626c-.41-.006-.833-.012-1.089-.118-.278-.115-.596-.42-.903-.714-.54-.518-1.152-1.105-1.968-1.105-.816 0-1.428.587-1.968 1.105-.307.294-.625.599-.903.714-.256.106-.679.112-1.089.118-.762.012-1.626.025-2.227.626s-.614 1.465-.626 2.227c-.006.41-.012.833-.118 1.089-.115.278-.42.596-.714.903C1.837 8.572 1.25 9.184 1.25 10c0 .816.587 1.428 1.105 1.968.294.307.599.625.714.903.106.256.112.679.118 1.089.012.762.025 1.626.626 2.227s1.465.614 2.227.626c.41.006.833.012 1.089.118.278.115.596.42.903.714.54.518 1.152 1.105 1.968 1.105.816 0 1.428-.587 1.968-1.105.307-.294.625-.599.903-.714.256-.106.679-.112 1.089-.118.762-.012 1.626-.025 2.227-.626s.614-1.465.626-2.227c.006-.41.012-.833.118-1.089.115-.278.42-.596.714-.903.518-.54 1.105-1.152 1.105-1.968 0-.816-.587-1.428-1.105-1.968Zm-3.94-1.737a1 1 0 0 0-1.418 0L10 8.592 7.713 6.295a1.002 1.002 0 0 0-1.418 1.418L8.592 10l-2.297 2.287a.998.998 0 0 0 0 1.418 1 1 0 0 0 1.418 0L10 11.408l2.287 2.297a.998.998 0 0 0 1.418 0 1 1 0 0 0 0-1.418L11.408 10l2.297-2.287a.998.998 0 0 0 0-1.418Z" />
                                        </svg></span>'
                                    ],
                                    'notsure' => [
                                        'label' => 'masih ragu',
                                        'icon'  => '<span class="saic-author-mark saic-post-author-notsure"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" xml:space="preserve" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 20 20">
                                          <path fill="#ffda73" d="M17.645 8.032c-.294-.307-.599-.625-.714-.903-.106-.256-.112-.679-.118-1.089-.012-.762-.025-1.626-.626-2.227s-1.465-.614-2.227-.625c-.41-.007-.833-.013-1.089-.119-.278-.115-.596-.42-.903-.714-.54-.518-1.152-1.105-1.968-1.105-.816 0-1.428.587-1.968 1.105-.307.294-.625.599-.903.714-.256.106-.679.112-1.089.119-.762.011-1.626.024-2.227.625s-.614 1.465-.625 2.227c-.007.41-.013.833-.119 1.089-.115.278-.42.596-.714.903C1.837 8.572 1.25 9.184 1.25 10c0 .816.587 1.428 1.105 1.968.294.307.599.625.714.903.106.256.112.679.119 1.089.011.762.024 1.626.625 2.227s1.465.614 2.227.626c.41.006.833.012 1.089.118.278.115.596.42.903.714.54.518 1.152 1.105 1.968 1.105.816 0 1.428-.587 1.968-1.105.307-.294.625-.599.903-.714.256-.106.679-.112 1.089-.118.762-.012 1.626-.025 2.227-.626s.614-1.465.626-2.227c.006-.41.012-.833.118-1.089.115-.278.42-.596.714-.903.518-.54 1.105-1.152 1.105-1.968 0-.816-.587-1.428-1.105-1.968ZM10 15a.942.942 0 0 1-.937-.937c0-.515.423-.938.937-.938s.938.423.938.938A.942.942 0 0 1 10 15Zm.625-3.82v.07a.628.628 0 0 1-.625.625.628.628 0 0 1-.625-.625v-.625c0-.342.282-.625.625-.625a1.57 1.57 0 0 0 1.562-1.562A1.57 1.57 0 0 0 10 6.875c-.857 0-1.563.706-1.563 1.563a.628.628 0 0 1-.625.625.628.628 0 0 1-.625-.625A2.826 2.826 0 0 1 10 5.626a2.825 2.825 0 0 1 2.812 2.812 2.82 2.82 0 0 1-2.187 2.742Z" />
                                        </svg></span>'
                                    ]
                                ];

                                $currentStatus = $row['attendance'];

                                echo $attendanceStatus[$currentStatus]['icon'];
                                ?>

                         </div>

                         <div class="saic-comment-text">
                             <p>
                                 <?php echo htmlspecialchars($row['comment']); ?>
                             </p>
                         </div>

                         <!-- <div class="saic-comment-time">13 jam, 30 menit yang lalu
                                    </div> -->
                         <div class="saic-comment-time">
                             <?php
                                $created_at = $row['created_at'];

                                // Mengonversi created_at menjadi objek DateTime
                                $created_time = new DateTime($created_at);
                                $current_time = new DateTime(); // Waktu sekarang

                                // Menghitung selisih waktu antara waktu sekarang dan waktu yang disimpan
                                $interval = $current_time->diff($created_time);

                                // Menampilkan hasil dalam format yang diinginkan
                                $time_text = "";

                                // Menampilkan jam dan menit
                                if ($interval->h > 0) {
                                    $time_text .= $interval->h . ' jam';
                                }
                                if ($interval->i > 0) {
                                    if ($time_text) {
                                        $time_text .= ', ';
                                    }
                                    $time_text .= $interval->i . ' menit';
                                }

                                // Jika waktu tidak kosong, tampilkan, jika tidak, tampilkan "Baru saja"
                                if ($time_text) {
                                    echo $time_text . ' yang lalu';
                                } else {
                                    echo 'Baru saja';
                                }
                                ?>
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
    $conn->close();
    ?>