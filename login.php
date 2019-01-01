<?php

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'"; //buat get
$query = mysqli_query($koneksi, $sql); //jalanquery

$cek = mysqli_num_rows($query); //cek data
if ($cek > 0){
    while($row = mysqli_fetch_assoc($query)){
        
        $data['id'] = $row['id'];
        $data['username'] = $row['username'];
        $data['nama'] = $row['nama'];
        $data['status'] = 'sukses';

        echo json_encode($data);
    }
}else{
    $data['status'] = 'gagal';

    echo json_encode($data);
}

?>