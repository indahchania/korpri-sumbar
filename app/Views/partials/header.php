<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
</head>

<body>
    <!-- Header Section -->
    <header class="header">
        <div class="header-content">
            <img src="<?= base_url('img/korpri-header.png'); ?>" alt="Header Image" class="header-bg">
            <div class="header-left">
                <a href="<?= base_url('/'); ?>">
                    <img src="<?= base_url('img/korprilogo.png'); ?>" alt="KORPRI Logo" class="logo">
                </a>
            </div>
            <div class="header-right">
                <div class="dropdown-icon" id="dropdown-toggle">
                    <img src="<?= base_url('img/dropdown.png'); ?>" alt="Dropdown Icon">
                </div>
            </div>
        </div>
    </header>

    <!-- Side Menu -->
    <div class="side-menu" id="side-menu">
        <ul>
            <li class="main-item">Tentang <span class="arrow">▼</span>
                <ul>
                    <li><a href="<?= base_url('tentang/sejarah') ?>">Sejarah</a></li>
                    <li><a href="<?= base_url('tentang/visi-dan-misi') ?>">Visi dan Misi</a></li>
                    <li><a href="<?= base_url('tentang/tujuan-dan-fungsi') ?>">Tujuan dan Fungsi</a></li>
                    <li><a href="<?= base_url('tentang/panca-prasetya') ?>">Panca Prasetya</a></li>
                    <li><a href="<?= base_url('tentang/struktur-organisasi') ?>">Struktur Organisasi</a></li>
                    <li><a href="<?= base_url('tentang/program-utama') ?>">Program Utama</a></li>
                </ul>
            </li>
            <li class="main-item">Media <span class="arrow">▼</span>
                <ul>
                    <li><a href="<?= base_url('media/berita'); ?>">Berita</a></li>
                    <li><a href="<?= base_url('media/kegiatan'); ?>">Kegiatan</a></li>
                    <li><a href="<?= base_url('media/pengumuman'); ?>">Pengumuman</a></li>
                    <li><a href="<?= base_url('media/publikasi'); ?>">Publikasi Resmi</a></li>
                </ul>
            </li>

            <li class="main-item">Karir <span class="arrow">▼</span>
                <ul>
                    <li><a href="<?= base_url('karirMenu?category=fulltime') ?>">Fulltime</a></li>
                    <li><a href="<?= base_url('karirMenu?category=kontrak') ?>">Kontrak</a></li>
                    <li><a href="<?= base_url('karirMenu?category=magang') ?>">Magang</a></li>
                </ul>
            </li>

            <li class="main-item"><a href="<?= base_url('kontak'); ?>">Kontak Kami</a></li>
        </ul>
    </div>

    <script>
        const dropdownIcon = document.getElementById('dropdown-toggle');
        const sideMenu = document.getElementById('side-menu');

        // Toggle the side menu when the dropdown icon is clicked
        dropdownIcon.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevents click from closing the menu
            const isVisible = sideMenu.style.right === '0px';
            sideMenu.style.right = isVisible ? '-250px' : '0px';
        });

        // Hide the side menu when clicking outside of it
        document.addEventListener('click', function(event) {
            if (!sideMenu.contains(event.target) && !dropdownIcon.contains(event.target)) {
                sideMenu.style.right = '-250px';
            }
        });

        // Show the side menu when hovering over the dropdown icon, and hide when leaving
        dropdownIcon.addEventListener('mouseenter', () => {
            sideMenu.style.right = '0px';
        });

        sideMenu.addEventListener('mouseleave', () => {
            sideMenu.style.right = '-250px';
        });
    </script>
</body>

</html>