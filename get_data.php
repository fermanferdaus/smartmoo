<?php
include 'koneksi.php';

// Query untuk mengambil jadwal dan suhu
$sql_jadwal = "SELECT TIME_FORMAT(jadwal1, '%H:%i') as jadwal1, 
                      TIME_FORMAT(jadwal2, '%H:%i') as jadwal2,
                      TIME_FORMAT(jadwal3, '%H:%i') as jadwal3,
                      suhu1, suhu2
               FROM tb_jadwal WHERE id=1";
$result = mysqli_query($koneksi, $sql_jadwal);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        // Jika data ditemukan, kirimkan data suhu dan jadwal dalam format JSON
        $response = array(
            "suhu1" => $row['suhu1'],
            "suhu2" => $row['suhu2'],
            "jadwal1" => $row['jadwal1'],
            "jadwal2" => $row['jadwal2'],
            "jadwal3" => $row['jadwal3']
        );
        echo json_encode($response);
    } else {
        // Jika data tidak ditemukan, gunakan nilai default
        $response = array(
            "suhu1" => 30, // Suhu default
            "suhu2" => 35, // Suhu default
            "jadwal1" => "08:30", // Jadwal default
            "jadwal2" => "12:00",  // Jadwal default
            "jadwal3" => "17:00"  // Jadwal default
        );
        echo json_encode($response);
    }
} else {
    // Jika query gagal, tampilkan pesan error
    echo "Query gagal: " . mysqli_error($koneksi);
}

$koneksi->close();
?>
