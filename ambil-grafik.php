<?php
include 'koneksi.php';
$dari = $_GET['dari'] ?? date('Y-m-d');
$sampai = $_GET['sampai'] ?? date('Y-m-d');

$query = "SELECT tanggal, suhu, heart_rate, oksigen FROM tb_data WHERE tanggal BETWEEN '$dari' AND '$sampai' ORDER BY tanggal ASC";
$result = mysqli_query($koneksi, $query);

$tanggal = [];
$suhu = [];
$heart_rate = [];
$oksigen = [];

while ($row = mysqli_fetch_assoc($result)) {
  $tanggal[] = $row['tanggal'];
  $suhu[] = $row['suhu'];
  $heart_rate[] = $row['heart_rate'];
  $oksigen[] = $row['oksigen'];
}

echo json_encode([
  'tanggal' => $tanggal,
  'suhu' => $suhu,
  'heart_rate' => $heart_rate,
  'oksigen' => $oksigen
]);
?>
