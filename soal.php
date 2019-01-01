<?php

include 'koneksi.php';

if (isset($_GET['id'])) {
	$id 	=$_GET['id'];
	$sql 	= "SELECT * FROM `soal` WHERE id=$id"; 
}elseif (isset($_GET['materi_id'])) {
	$materi_id = $_GET['materi_id'];
	$sql = "SELECT * FROM `soal` WHERE materi_id=$materi_id"; 
}else{
	$sql = "SELECT * FROM `soal`"; 
}

$query 	= mysqli_query($koneksi, $sql); //jalanquery
$cek 	= mysqli_num_rows($query); //cek data
if ($cek > 0){
	$catch = array();
    while($row = mysqli_fetch_assoc($query)){
        $catch[] = $row;
    }
    $send['status'] =200;
    $send['data'] 	= $catch;
    echo json_encode($send);
}else{
    $data['status'] =404;
    echo json_encode($data);
}

?>