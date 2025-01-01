<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/register.css') ?>">
</head>
<body>
    <div class="wrapper">
        <h1>Masuk</h1>
        <?php
        if (session ()->getFlashdata('pesan')) {
            echo '<div class="alert alert-danger">'.session()->getFlashdata('pesan').'</div>';
        } 
        ?>
        <form action="<?php echo base_url('/login/action') ?>" method="POST">
            <input type="text" name="username" placeholder="Nama Pengguna">
            <input type="password" name="password" id="password" placeholder="Kata Sandi">
            <div class="recover">
                <a href="#">Lupa Kata Sandi</a>
            </div>
            <div class="terms">
                <input type="checkbox" id="checkbox" onclick="showMyFunction()">
                <label for="checkbox">Tampilkan Kata Sandi</label>
            </div>
            <!-- Tombol submit dalam form -->
            <button type="submit">Masuk</button>
        </form>
        <div class="member">
            Belum punya akun? <a href="<?= base_url('register') ?>">Daftar disini</a>
        </div>
    </div>
    <script>
        function showMyFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
