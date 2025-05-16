<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil jadwal dari database dengan format HH:mm
$query = "SELECT TIME_FORMAT(jadwal1, '%H:%i') AS jadwal1, 
                 TIME_FORMAT(jadwal2, '%H:%i') AS jadwal2,
                 TIME_FORMAT(jadwal3, '%H:%i') AS jadwal3
          FROM tb_jadwal 
          WHERE id = 1"; // Sesuaikan dengan kebutuhan
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        'jadwal1' => $row['jadwal1'],
        'jadwal2' => $row['jadwal2'],
        'jadwal3' => $row['jadwal3']
    ]);
} else {
    echo json_encode([
        'jadwal1' => null,
        'jadwal2' => null,
        'jadwal3' => null
    ]);
}
?>
