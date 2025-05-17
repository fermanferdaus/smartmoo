<?php
session_start(); // Memastikan sesi dimulai

// Menghancurkan sesi
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <!-- Memuat SweetAlert dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk menampilkan SweetAlert setelah logout
        function showLogoutAlert() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Anda telah Logout!',
                confirmButtonText: 'OK'
            }).then((result) => {
                // Setelah menekan tombol OK, redirect ke index.php
                window.location.href = 'login.php'; // Redirect ke halaman login
            });
        }

        // Menjalankan fungsi alert setelah halaman dimuat
        window.onload = showLogoutAlert;
    </script>
</head>
</html>
