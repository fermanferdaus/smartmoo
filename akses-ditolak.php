<?php
session_start(); // Memastikan sesi sudah dimulai

// Memeriksa apakah username dan password diset di session
if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
    // Jika belum login, tampilkan alert dengan SweetAlert
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Akses Ditolak</title>
        <!-- SweetAlert2 -->
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Ditolak',
                text: 'Silakan login terlebih dahulu!',
                confirmButtonText: 'Tutup'
            }).then(function() {
                window.location.href = 'login.php'; // Ganti dengan halaman login Anda
            });
        </script>
    </body>
    </html>";
    exit(); // Hentikan eksekusi script lebih lanjut setelah menampilkan alert
}
?>
