<?php
include 'koneksi.php';

// Ambil data dari POST
$temperature = $_POST['suhu'];
$heart_rate = $_POST['heart_rate'];
$oksigen = $_POST['oksigen'];
$baterai = $_POST['baterai'];
$wifi_strength = $_POST['wifi_strength'];


// Update tabel data
$sql_data = "INSERT tb_data SET suhu='$temperature', heart_rate='$heart_rate', oksigen='$oksigen', baterai='$baterai', status_koneksi='$wifi_strength'";
$koneksi->query($sql_data);

$koneksi->close();
?>
