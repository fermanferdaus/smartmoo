<?php
include 'koneksi.php';

// Ambil parameter dari URL
$dari = $_GET['dari'] ?? date('Y-m-d');
$sampai = $_GET['sampai'] ?? date('Y-m-d');

// Query data berdasarkan tanggal
$query = "SELECT tanggal, suhu, heart_rate, oksigen 
          FROM tb_data 
          WHERE tanggal BETWEEN '$dari' AND '$sampai' 
          ORDER BY tanggal ASC";

$result = mysqli_query($koneksi, $query);

$data = [];

// Ubah hasil query menjadi array of object
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'tanggal'     => $row['tanggal'],
        'suhu'        => $row['suhu'],
        'heart_rate'  => $row['heart_rate'],
        'oksigen'     => $row['oksigen']
    ];
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($koneksi);
?>
