<?php
include "../includes/koneksi.php";

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = mysqli_query($koneksi, "
    INSERT INTO users (nama, email, password) 
    VALUES ('$nama', '$email', '$password')
");

if($query){
    header("Location: login.php");
    exit();
}else{
    echo "Register gagal: " . mysqli_error($koneksi);
}
?>
