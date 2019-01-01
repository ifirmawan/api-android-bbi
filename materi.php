<?php

include 'koneksi.php';


if (isset($_GET['id'])) {
	$id 	=$_GET['id'];
	$sql 	= "SELECT * FROM `materi` WHERE id=$id"; 
}else{
	$sql = "SELECT * FROM `materi`"; 
}

$query 	= mysqli_query($koneksi, $sql); //jalanquery
$cek 	= mysqli_num_rows($query); //cek data

if ($cek > 0){
	$catch = array();
    while($row = mysqli_fetch_assoc($query)){
    	$query_soal 	= mysqli_query($koneksi, "SELECT * FROM `soal` WHERE materi_id=".$row['id']);
    	$query_asset 	= mysqli_query($koneksi, "SELECT * FROM `asset_materi` WHERE materi_id=".$row['id']);
    	
    	$cek_query_soal = mysqli_num_rows($query_soal);
    	$cek_query_asset = mysqli_num_rows($query_asset);

    	$soal 			= array();
    	$asset 			= array();
    	if ($cek_query_soal > 0) {
    		while ($quiz = mysqli_fetch_assoc($query_soal)) {
    			$soal[] = $quiz;
    		}
    	}

    	if ($cek_query_asset > 0) {
    		while ($items = mysqli_fetch_assoc($query_asset)) {
    			$asset[] = $items;
    		}
    	}

    	if (isset($_GET['id'])) {
    		$materi = array(
        		'id' => $row['id'],
        		'judul' => $row['judul'],
        		'deskripsi'=> $row['deskripsi']
        	);
    	}else{
    		$materi = array(
        		'id' => $row['id'],
        		'judul' => $row['judul']
        	);
    	}
        $catch[] = array(
        	'materi' => $materi,
        	'soal'=> $soal,
        	'asset' => $asset
        );

    }

    $send['status'] =200;
    $send['data'] 	= $catch;
    $json =json_encode($send);
    echo $json;
}else{
    $data['status'] =404;
    echo json_encode($data);
}

?>