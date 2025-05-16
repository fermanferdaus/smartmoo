<?php
include 'koneksi.php';

$dari = $_GET['dari'] ?? date('Y-m-d');
$sampai = $_GET['sampai'] ?? date('Y-m-d');

$query = "SELECT * FROM tb_data WHERE tanggal BETWEEN '$dari' AND '$sampai' ORDER BY tanggal ASC";

$result = $koneksi->query($query);
$data = [
  'tanggal' => [],
  'suhu' => [],
  'heart_rate' => [],
  'oksigen' => []
];

while ($row = $result->fetch_assoc()) {
  $data['tanggal'][] = $row['tanggal'];
  $data['suhu'][] = (float)$row['suhu'];
  $data['heart_rate'][] = (int)$row['heart_rate'];
  $data['oksigen'][] = (float)$row['oksigen'];
}

echo json_encode($data);
?>
