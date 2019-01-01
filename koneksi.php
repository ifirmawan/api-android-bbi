<?php
/*
production
$server 	= 'localhost';
$user 	= 'renw8819_bbi';
$pass 	= 'qazokm2015';
$db 		= 'renw8819_bbi';
*/

//development
$server 	= 'localhost';
$user 	= 'root';
$pass 	= '';
$db 		= 'bbi';

$koneksi = mysqli_connect($server, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi Gagal : ".mysqli_connect_error());
}


?>