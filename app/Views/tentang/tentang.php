<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang KORPRI</title>
    <link rel="stylesheet" href="<?= base_url('css/tentang.css') ?>">
</head>

<body>
    <?= view('partials/header') ?>

    <main class="main-section">
        <!-- Breadcrumb Navigasi -->
        <div class="breadcrumb">
            <a href="<?= base_url('/') ?>">Beranda</a> &gt; Tentang
        </div>

        <!-- Daftar Kategori -->
        <section class="categories-section">
            <ul class="categories-list">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="<?= base_url('tentang/' . urlencode($category['category_name'])) ?>"
                            class="<?= ($selectedCategory == $category['category_name']) ? 'active' : '' ?>">
                            <?= esc($category['category_name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Konten Halaman -->
        <section class="content-section">
            <?php if (!empty($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <div class="content-item">
                        <h3><?= esc($page['pages_title']) ?></h3>
                        <p class="meta">
                            Oleh <?= esc($page['pages_author']) ?> | <?= date('d M Y', strtotime($page['pages_posted'])) ?>
                        </p>
                        <?php if (!empty($page['pages_img'])): ?>
                            <img src="<?= base_url('uploads/pages/' . esc($page['pages_img'])) ?>"
                                alt="<?= esc($page['pages_title']) ?>"
                                class="content-image">
                        <?php endif; ?>
                        <div class="content-body">
                            <?= $page['pages_body'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada data untuk kategori ini.</p>
            <?php endif; ?>
        </section>
    </main>

    <?= view('partials/footer') ?>
</body>

</html>