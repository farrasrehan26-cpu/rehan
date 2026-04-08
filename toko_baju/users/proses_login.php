<?php
session_start();
include "../includes/koneksi.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email'");
$data  = mysqli_fetch_assoc($query);

if($data && password_verify($password, $data['password'])){

    $_SESSION['user_id'] = $data['id'];
    $_SESSION['nama']    = $data['nama'];
    $_SESSION['role']    = $data['role']; 

    if($data['role'] == 'admin'){
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../index.php");
    }

    exit();

}else{
    header("Location: login.php?error=1");
    exit();
}
?>