<?php 
$koneksi = mysqli_connect("localhost","root","","db_spp_zidane");

//check connection 
if (mysqli_connect_errno()){
    echo "koneksi database gagal :".msyqli_connect_error();

}
?>