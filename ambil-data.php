<?php
include 'koneksi.php';

$query = "SELECT tanggal, suhu, heart_rate, oksigen, baterai, status_koneksi FROM tb_data ORDER BY tanggal ASC";
$result = $koneksi->query($query);

$data = [
  'tanggal' => [],
  'suhu' => [],
  'heart_rate' => [],
  'oksigen' => [],
  'baterai' => [],
  'status_koneksi' => []
];

while ($row = $result->fetch_assoc()) {
  $data['tanggal'][] = $row['tanggal'];
  $data['suhu'][] = (float)$row['suhu'];
  $data['heart_rate'][] = (int)$row['heart_rate'];
  $data['oksigen'][] = (int)$row['oksigen'];
  $data['baterai'][] = (int)$row['baterai'];
  $data['status_koneksi'][] = (float)$row['status_koneksi'];
}

echo json_encode($data);
?>
