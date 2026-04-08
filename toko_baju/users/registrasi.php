<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register - TokoBaju</title>
<link rel="stylesheet" href="../css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="auth-container">
    <div class="auth-card">
        <h2>Buat Akun Baru</h2>

        <form action="proses_register.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>
