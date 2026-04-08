<?php
session_start();
include "includes/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$produk = mysqli_query($koneksi, "SELECT * FROM produk");

if (!$produk) {
    die("Query produk error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Toko Baju Modern</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
<h2>TOKOBAJU</h2>
<div>
<a href="#">Home</a>
<a href="#">Produk</a>
<a href="#">Kontak</a>
</div>
</nav>

<section class="hero">
<h1>bakul klambi kalcer</h1>
<p>Tampil keren setiap hari dengan koleksi terbaik kami</p>
</section>

<section class="section">
<div class="title">
<h2>Produk Kami</h2>
<p>bahan kalcer lurr</p>
</div>

<div class="products">

<?php while($row = mysqli_fetch_assoc($produk)) { ?>

<div class="card">

<?php if(!empty($row['gambar'])){ ?>
    <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="produk">
<?php } else { ?>
    <img src="images/<?php echo $row['gambar']; ?>" width="200">
<?php } ?>

<div class="card-body">
    <h3><?= htmlspecialchars($row['nama']) ?></h3>
    <p><?= htmlspecialchars($row['deskripsi']) ?></p>
    <div class="price">Rp <?= number_format($row['harga'],0,',','.') ?></div>

<?php if(isset($_SESSION['user_id'])) { ?>
    <a href="users/checkout.php?id_produk=<?= $row['id_produk'] ?>" class="btn">
        Beli Sekarang
    </a>
<?php } else { ?>
    <a href="users/login.php" class="btn">
        Login untuk beli
    </a>
<?php } ?>

</div>
</div>

<?php } ?>

</div>
</section>

<footer>
<p>© <?= date('Y'); ?> TokoBaju - All Rights Reserved</p>

<?php if(isset($_SESSION['user_id'])): ?>
 | <a href="users/login.php">Logout</a>
<?php else: ?>
 | <a href="users/login.php">Login</a>
<?php endif; ?>

</footer>

</body>
</html>
