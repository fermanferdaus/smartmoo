<?php
include 'koneksi.php';

// Ambil data dari POST
$temperature = $_POST['suhu'];
$berat = $_POST['berat'];
$status_pakan = $_POST['status_pakan'];
$status_lampu = $_POST['status_lampu'];
$status_kipas = $_POST['status_kipas'];

// Update tabel data
$sql_data = "UPDATE tb_data SET suhu='$temperature', berat='$berat', status_lampu='$status_lampu', status_kipas='$status_kipas' WHERE id=1";
$koneksi->query($sql_data);

$sql_status = "UPDATE tb_data SET status_pakan='$status_pakan' WHERE id=1";
$koneksi->query($sql_status);

$koneksi->close();
?>
