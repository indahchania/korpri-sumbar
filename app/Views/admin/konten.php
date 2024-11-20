<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konten</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/konten.css') ?>">
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
                    <a href="#">
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
                    <a href="<?php echo base_url('/logout') ?>" method="get">
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

        <div class="isi-konten">
            <div class="isi-dalam-konten">
                <h1>Konten</h1>
                <div class="nambah-konten">
                    <a href="<?= base_url('create_konten') ?>"><button>Tambah Konten</button></a>
                </div>
                <br>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contents as $content): ?>
                            <tr>
                                <td><?= esc($content['content_title']) ?></td>
                                <td><?= esc($content['content_author']) ?></td>
                                <td><?= esc($content['content_body']) ?></td>
                                <td>
                                    <a href="<?= base_url('uploads/konten/' . esc($content['content_img'])) ?>" target="_blank">
                                        <img src="<?= base_url('uploads/konten/' . esc($content['content_img'])) ?>" alt="Image">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('uploads/konten/' . esc($content['content_file'])) ?>" target="_blank">
                                        View PDF
                                    </a>
                                </td>
                                <td><?= esc($content['content_status']) ?></td>
                                <td><?= esc($content['category_name']) ?></td>
                                <td>
                                    <a href="<?= base_url('edit_konten/' . esc($content['content_id'])) ?>"><button>Edit</button></a>
                                    <a href="<?= base_url('delete_konten/' . esc($content['content_id'])) ?>"><button>Hapus</button></a>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- script !-->
        <script src="<?= base_url('js/admin.js') ?>"></script>
        <!-- ionicons !-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>