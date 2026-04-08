<?php
include "../includes/koneksi.php";

$nama       = $_POST['nama'];
$deskripsi  = $_POST['deskripsi'];
$harga      = $_POST['harga'];

/* Upload Gambar */
$namaFile = $_FILES['gambar']['name'];
$tmpName  = $_FILES['gambar']['tmp_name'];

$folder = "../images/";
move_uploaded_file($tmpName, $folder.$namaFile);

$pathGambar = "images/".$namaFile;

mysqli_query($koneksi,"
INSERT INTO produk (nama, deskripsi, harga, gambar)
VALUES ('$nama','$deskripsi','$harga','$pathGambar')
");

header("Location: dashboard.php");
exit();
?>