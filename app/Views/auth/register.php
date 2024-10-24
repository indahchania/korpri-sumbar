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
        <form action="#">
            <input type="text" placeholder="Nama">
            <input type="text" placeholder="Nama Pengguna">
            <input type="email" placeholder="Email">
            <input type="password" id="password" placeholder="Kata Sandi">
        </form>
        <div class="terms">
            <input type="checkbox" id="checkbox" onclick="showMyFunction()">
            <label for="checkbox">Tampilkan Kata Sandi</label>
        </div>
        <button>Register</button>
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