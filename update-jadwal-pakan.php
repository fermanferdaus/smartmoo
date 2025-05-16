<?php
include 'koneksi.php';

// Ambil data JSON dari permintaan
$data = json_decode( file_get_contents( 'php://input' ), true );
$jadwal1 = $data[ 'jadwal1' ];
$jadwal2 = $data[ 'jadwal2' ];
$jadwal3 = $data[ 'jadwal3' ];

// Update jadwal di database
$query = "UPDATE tb_jadwal SET jadwal1 = '$jadwal1', jadwal2 = '$jadwal2', jadwal3 = '$jadwal3' WHERE id = 1";
$result = mysqli_query( $koneksi, $query );

// Cek apakah update berhasil dan kembalikan respons JSON
$response = [ 'success' => $result ? true : false ];
if ( !$result ) {
    $response[ 'error' ] = mysqli_error( $koneksi );
}

echo json_encode( $response );

mysqli_close( $koneksi );
?>
