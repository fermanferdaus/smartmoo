<?php
include 'koneksi.php';

// Ambil suhu terbaru
$query = 'SELECT tanggal, suhu, heart_rate, oksigen, baterai, status_koneksi FROM tb_data  ORDER BY id DESC LIMIT 1';
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Kembalikan data dalam format JSON
echo json_encode($data);

mysqli_close($koneksi);
?>
