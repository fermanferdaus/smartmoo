<?php
include 'koneksi.php';

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 1;

$query = "SELECT tanggal, suhu, heart_rate, oksigen, baterai, status_koneksi FROM tb_data ORDER BY id DESC LIMIT $limit";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

echo json_encode($limit === 1 ? $data[0] : $data);

mysqli_close($koneksi);
?>