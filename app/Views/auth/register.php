<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
    <div class="wrapper">
        <h1>Register</h1>
        <form action="<?php echo base_url('/register/action') ?>" method="POST">
            <input required type="text" name="nama" placeholder="Nama">
            <input required type="text" name="username" placeholder="Nama Pengguna">
            <input required type="email" name="email" placeholder="Email">
            <input required type="password" id="password" name="password" placeholder="Kata Sandi">
            <button type="submit">Daftar</button>
        </form>
        <div class="terms">
            <input type="checkbox" id="checkbox" onclick="showMyFunction()">
            <label for="checkbox">Tampilkan Kata Sandi</label>
        </div>
        <div class="member">
            Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk disini</a>
        </div>
    </div>
    <script>
        function showMyFunction(){
            var x = document.getElementById("password");
            if(x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>