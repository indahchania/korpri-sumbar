<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/create_konten.css') ?>">
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

                <li>
                    <a href="<?= base_url('admin') ?>">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="active-page">
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
            <div class="konten-wrap">
                <div class="konten-isi">
                    <h1>Konten</h1>
                    <form action="<?php echo base_url('save_konten') ?>" method="POST" enctype="multipart/form-data">
                    <label for="kategori">Kategori</label>
                    <select name="content_category" id="kategori">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['concategory_id'] ?>"><?= $category['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>

                        <br><label for="judul">Judul</label>
                        <input type="text" id="judul" name="content_title"><br>

                        <label for="author">Author</label>
                        <input type="text" id="judul" name="content_author"><br>

                        <label for="isi">Isi</label>
                        <textarea id="isi" class="isi-lebar" name="content_body"></textarea><br>

                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" accept="image/png, image/jpeg" name="content_img"><br>

                        <label for="file">File</label>
                        <input type="file" id="file" name="content_file"><br>

                        <label for="status">Status</label>
                        <select name="content_status" id="status">
                            <option value="publik">Publik</option>
                            <option value="draft">Draft</option>
                            <option value="arsip">Arsip</option>
                        </select>
                        <br><input type="submit" value="Simpan" class="simpan">
                    </form>
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