<?php
include 'koneksi.php';

// Ambil data JSON dari permintaan
$data = json_decode( file_get_contents( 'php://input' ), true );
$suhu1 = $data[ 'suhu1' ];
$suhu2 = $data[ 'suhu2' ];

// Update suhu di database
$query = "UPDATE tb_jadwal SET suhu1 = '$suhu1', suhu2 = '$suhu2' WHERE id = 1";
$result = mysqli_query( $koneksi, $query );

// Cek apakah update berhasil dan kembalikan respons JSON
$response = [ 'success' => $result ? true : false ];
if ( !$result ) {
    $response[ 'error' ] = mysqli_error( $koneksi );
}

echo json_encode( $response );

mysqli_close( $koneksi );
?>
