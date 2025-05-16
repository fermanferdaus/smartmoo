<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil jadwal dari database dengan format HH:mm
$query = "SELECT suhu1,
                 suhu2
          FROM tb_jadwal 
          WHERE id = 1"; // Sesuaikan dengan kebutuhan
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        'suhu1' => $row['suhu1'],
        'suhu2' => $row['suhu2']
    ]);
} else {
    echo json_encode([
        'suhu1' => null,
        'suhu2' => null
    ]);
}
?>
