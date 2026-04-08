<?php
session_start();
include "../includes/koneksi.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id_produk'])){
    die("Produk tidak ditemukan");
}

$id_produk = $_GET['id_produk'];

$produk = mysqli_query($koneksi,
    "SELECT * FROM produk WHERE id_produk='$id_produk'"
);

if(!$produk){
    die(mysqli_error($koneksi));
}

$p = mysqli_fetch_assoc($produk);

if(!$p){
    die("Produk tidak ada");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:20px}
.checkout-box{
max-width:400px;
margin:auto;
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,.1)
}
input,button{width:100%;padding:10px;margin-top:10px}
button{background:#2b7cff;color:white;border:none}
</style>
</head>
<body>

<div class="checkout-box">
<h2>Checkout Produk</h2>

<p><b><?= $p['nama']; ?></b></p>
<p>Harga: Rp <?= number_format($p['harga']); ?></p>

<form method="post" action="proses_checkout.php">

<input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>">
<input type="hidden" name="harga" value="<?= $p['harga']; ?>">

<input type="text" name="alamat" placeholder="Alamat pengiriman" required>
<input type="number" name="jumlah" placeholder="Jumlah beli" required>

<button>Konfirmasi Pesanan</button>

</form>
</div>

</body>
</html>
