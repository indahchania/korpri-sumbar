<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/admin.css') ?>">
</head>
<body>
    <!-- navbar !-->
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Admin</span>
                    </a>
                </li>

                <li class="active-page">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('konten') ?>">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Konten</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('pages') ?>">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Pages</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('karir') ?>">
                        <span class="icon">
                            <ion-icon name="business-outline"></ion-icon>
                        </span>
                        <span class="title">Karir</span>
                    </a>
                </li>

                <li>
                    <a href= "<?php echo base_url('/logout') ?>" method="get">
                        <span class="icon">
                            <ion-icon name="exit-outline"></ion-icon>
                        </span>
                        <span class="title">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="isi-main">
            <div class="isi-utama-main">
                <div>
                    <div class="icon-isi">
                        <a href="<?= base_url('konten') ?>"><ion-icon name="albums-outline"></ion-icon></a>
                    </div>
                    <div class="isi-judul">
                        <a href="<?= base_url('konten') ?>">Konten</a>
                    </div>
                </div>
            </div>
            <div class="isi-utama-main">
                <div>
                    <div class="icon-isi">
                        <a href="<?= base_url('pages') ?>"><ion-icon name="book-outline"></ion-icon></a>
                    </div>
                    <div class="isi-judul">
                        <a href="<?= base_url('pages') ?>">Pages</a>
                    </div>
                </div>
            </div>
            <div class="isi-utama-main">
                <div>
                    <div class="icon-isi">
                        <a href="<?= base_url('karir') ?>"><ion-icon name="business-outline"></ion-icon></a>
                    </div>
                    <div class="isi-judul">
                        <a href="<?= base_url('karir') ?>">Karir</a>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <!-- script !-->
    <script src="<?= base_url('js/admin.js') ?>"></script>
    <!-- ionicons !-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>