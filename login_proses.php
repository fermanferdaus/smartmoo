<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Menambahkan SweetAlert di sini -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    // Logika PHP untuk menangani login
    include 'koneksi.php';
    session_start();

    if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
        $username = $_POST[ 'username' ];
        $password = $_POST[ 'password' ];

        $query = "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query( $koneksi, $query );

        if ( mysqli_num_rows( $result ) > 0 ) {
            // Jika login sukses
            $_SESSION[ 'username' ] = $username;
            $_SESSION[ 'password' ] = $password;
            header( 'Location: index.php' );
            exit();
        } else {
            // Jika username atau password salah, tampilkan SweetAlert
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Username atau password salah!',
                        confirmButtonText: 'Tutup'
                    }).then(function() {
                        window.location.href = 'login.php';
                    });
                  </script>";
        }
    }
    ?>
</body>

</html>
