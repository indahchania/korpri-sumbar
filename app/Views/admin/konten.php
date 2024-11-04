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
                    <a href="<?= base_url('login') ?>">
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
                <table class="konten-isi">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Berita</td>
                            <td>Penghargaan</td>
                            <td>admin1</td>
                            <td class="isi-cell">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, omnis, harum aliquam, consectetur nemo laboriosam maiores voluptatem nihil ab quisquam nulla non quod ipsum aspernatur soluta minima modi molestiae numquam! Commodi similique repellat reiciendis laborum eos enim? Veniam, nulla perferendis!</td>
                            <td><img src="<?= base_url('img/award.jpg') ?>"></td>
                            <td><a href="<?= base_url('file/award.pdf') ?>">award.pdf</a></td>
                            <td>Publik</td>
                            <td>
                                <a href=""><button><ion-icon name="pencil-outline"></ion-icon></button></a>
                                <a href=""><button><ion-icon name="archive-outline"></ion-icon></button></a>
                                <a href=""><button><ion-icon name="trash-outline"></ion-icon></button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Kegiatan</td>
                            <td>Senam Pagi</td>
                            <td>admin1</td>
                            <td class="isi-cell">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td><img src="<?= base_url('img/senam.jpg') ?>"></td>
                            <td><a href="<?= base_url('file/senam.pdf') ?>">senam.pdf</a></td>
                            <td>Publik</td>
                            <td>
                                <a href=""><button><ion-icon name="pencil-outline"></ion-icon></button></a>
                                <a href=""><button><ion-icon name="archive-outline"></ion-icon></button></a>
                                <a href=""><button><ion-icon name="trash-outline"></ion-icon></button></a>
                            </td>
                        </tr>

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