<?php
session_start();
include "../includes/koneksi.php";

/* Wajib login */
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id   = $_SESSION['user_id'];
$produk_id = $_POST['id_produk'];
$jumlah    = $_POST['jumlah'];

/* Ambil harga produk */
$query = mysqli_query($koneksi,"SELECT harga FROM produk WHERE id_produk='$produk_id'");

if(mysqli_num_rows($query) == 0){
    die("Produk tidak ditemukan!");
}

$data  = mysqli_fetch_assoc($query);
$harga = $data['harga'];

$total = $harga * $jumlah;

/* Simpan ke table orders */
$simpan = mysqli_query($koneksi,"
    INSERT INTO orders (user_id, produk_id, jumlah, total_harga, tanggal)
    VALUES ('$user_id','$produk_id','$jumlah','$total',NOW())
");

if($simpan){
    echo "<script>
        alert('Checkout berhasil!');
        window.location='../index.php';
    </script>";
}else{
    echo "Error: " . mysqli_error($koneksi);
}
?>
