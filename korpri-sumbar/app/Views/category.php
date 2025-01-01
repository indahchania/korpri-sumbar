<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($category); ?> - KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/category.css') ?>">
</head>
<body>
<div class="page-wrapper">

<?= view('partials/header') ?> <!-- Menyertakan header -->

<!-- Main Section -->
<main class="main-section">
    <h1><?= esc($category); ?></h1>
    <?php if (!empty($pages)): ?>
        <?php foreach ($pages as $page): ?>
            <article class="page">
                <h2><?= esc($page['pages_title']); ?></h2>
                <p><i>Oleh: <?= esc($page['pages_author']); ?> - <?= date('d M Y', strtotime($page['pages_posted'])); ?></i></p>
                <?php if (!empty($page['pages_img'])): ?>
                    <img src="<?= base_url('uploads/' . esc($page['pages_img'])); ?>" alt="<?= esc($page['pages_title']); ?>" class="page-image">
                <?php endif; ?>
                <p><?= substr(strip_tags($page['pages_body']), 0, 200); ?>...</p>
                <a href="<?= base_url('page/' . $page['pages_id']); ?>" class="read-more">Baca Selengkapnya</a>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada halaman untuk kategori ini.</p>
    <?php endif; ?>
</main>

<?= view('partials/footer') ?> <!-- Menyertakan footer -->

</div>
</body>
</html>
