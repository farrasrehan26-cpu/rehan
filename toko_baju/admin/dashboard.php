<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../index.php");
    exit;
}

include "../includes/koneksi.php";

$produk  = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY id_produk DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{font-family:Arial;background:#f4f6f8;padding:20px}
.box{background:white;padding:20px;margin-bottom:30px;border-radius:10px}
table{width:100%;border-collapse:collapse}
th,td{border:1px solid #ddd;padding:8px;text-align:center}
button{padding:8px 12px}
img{border-radius:5px}
</style>
</head>

<body>

<h2>Dashboard Admin - Toko Baju</h2>

<!-- TAMBAH PRODUK -->
<div class="box">
<h3>Tambah Produk</h3>

<form action="tambahproduk.php" method="POST" enctype="multipart/form-data">
<input name="nama" placeholder="Nama Produk" required><br><br>
<textarea name="deskripsi" placeholder="Deskripsi" required></textarea><br><br>
<input name="harga" type="number" placeholder="Harga" required><br><br>
<input type="file" name="gambar" accept="image/*" required><br><br>
<button>Tambah Produk</button>
</form>
</div>

<!-- DATA PRODUK -->
<div class="box">
<h3>Data Produk</h3>

<table>
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Foto</th>
<th>Aksi</th>
</tr>

<?php $no=1; while($p=mysqli_fetch_assoc($produk)): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $p['nama'] ?></td>
<td>Rp <?= number_format($p['harga'],0,',','.') ?></td>
<td>
<img src="../<?= $p['gambar'] ?>" width="60">
</td>
<td>
<a href="hapusproduk.php?id=<?= $p['id_produk'] ?>" 
onclick="return confirm('Hapus produk ini?')">
Hapus
</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>

</body>
</html>