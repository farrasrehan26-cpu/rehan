<?php session_start(); ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - TokoBaju</title>
<link rel="stylesheet" href="../css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="auth-container">
    <div class="auth-card">
        <h2>Login Akun</h2>

        <form action="proses_login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn">Masuk</button>
        </form>

        <p>Belum punya akun? <a href="registrasi.php">Daftar sekarang</a></p>
    </div>
</div>

</body>
</html>
