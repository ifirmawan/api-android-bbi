<?php

include 'koneksi.php';

if (isset($_GET['id'])) {
	$id 	=$_GET['id'];
	$sql 	= "SELECT * FROM `user_highscore` WHERE id=$id"; 
}elseif (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];
	$sql = "SELECT * FROM `user_highscore` WHERE user_id=$user_id"; 
}else{
	$sql = "SELECT * FROM `user_highscore`"; 
}

$query 	= mysqli_query($koneksi, $sql); //jalanquery
$cek 		= mysqli_num_rows($query); //cek data
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