<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pages</title>
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

                <li>
                     <a href="<?= base_url('konten') ?>">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Konten</span>
                    </a>
                </li>

                <li class="active-page">
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
                    <img src="img" alt="">
                </div>
            </div>
        </div>
        <div class="konten-wrap">
            <div class="konten-isi">
                <h1>Pages</h1>
                <form action="<?= base_url('pages/update/' . $pages['pages_id']) ?>" method="POST" enctype="multipart/form-data"> 
                    <br><label for="kategori">Kategori</label>
                        <select name="pages_category" id="kategori">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['pagescategory_id'] ?>" <?= ($category['pagescategory_id'] == $pages['pages_category']) ? 'selected' : '' ?>>
                                <?= $category['category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                        </select><br>

                    <br><label for="judul">Judul</label>
                    <input type="text" id="judul" name="pages_title" value="<?= esc($pages['pages_title']) ?>"><br>

                    <label for="author">Author</label>
                    <input type="text" id="judul" name="pages_author" value="<?= esc($pages['pages_author']) ?>"><br>

                    <label for="isi">Isi</label>
                    <textarea id="isi" class="isi-lebar" name="pages_body" ><?= esc($pages['pages_body']) ?></textarea><br>

                    <label for="gambar">Gambar</label>
                    <input type="file" id="gambar" accept="image/png, image/jpeg" name="pages_img">
                    <p>Gambar saat ini:
                        <a href="<?= base_url('uploads/pages/' . esc($pages['pages_img'])) ?>" target="_blank">
                            <?= esc($pages['pages_img']) ?>
                        </a>
                    </p><br>

                    <label for="status">Status</label>
                    <select name="pages_status" id="status">
                        <option value="publik" <?= ($pages['pages_status'] == 'publik') ? 'selected' : '' ?>>Publik</option>
                        <option value="draft" <?= ($pages['pages_status'] == 'draft') ? 'selected' : '' ?>>Draft</option>
                        <option value="arsip" <?= ($pages['pages_status'] == 'arsip') ? 'selected' : '' ?>>Arsip</option>
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