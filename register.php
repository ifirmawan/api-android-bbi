<?php

include 'koneksi.php';

if(isset($_POST) ){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nama = trim($_POST['nama']);
    if(!empty($username) && !empty($password) && !empty($nama)){
        $query_exist = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
        $exist = mysqli_num_rows($query_exist); //cek data
        if ($exist > 0){
            $data['status'] = 'sudah ada';
            while($row = mysqli_fetch_assoc($query_exist)){

                $data['id'] = $row['id'];
                $data['username'] = $row['username'];
                $data['nama'] = $row['nama'];
                $data['status'] = 'sukses';
                echo json_encode($data);
            }
        }else{
            $sql = "INSERT INTO user (username,password,nama) values('$username','$password','$nama')"; //buat get
            $query = mysqli_query($koneksi, $sql); //jalanquery
            $query = mysqli_query($koneksi,"SELECT * from user WHERE username='$username'");
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

        }   
    }
}
