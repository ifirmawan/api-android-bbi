<?php

include 'koneksi.php';

if(isset($_POST['user_id']) && isset($_POST['highscore'])){
   $user_id 	= $_POST['user_id'];
   $highscore  = $_POST['highscore'];
   $sql 		        = "INSERT INTO user_highscore (user_id, highscore) values ($user_id,$highscore)";

   $sql_cek_exist    = "SELECT * FROM user_highscore WHERE user_id = $user_id AND highscore = $highscore AND DATE(`timestamp`) = CURDATE()";

   $query         = mysqli_query($koneksi, $sql_cek_exist); 
   $cek_exist     = mysqli_num_rows($query);
   if ($cek_exist > 0) {
      echo "Warning! your highscore already exist today";
   }else{
      if (mysqli_query($koneksi,$sql)) {
         echo "Success! your highscore has been added";
      }else{
         echo "Error! internal server error :(";
      }
   }

}