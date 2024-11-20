<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media - KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/media.css') ?>">
</head>
<body>
    <?= view('partials/header') ?>

    <main class="media-section">
        <h1>Media</h1>
        <nav class="media-menu">
            <ul>
                <li><a href="<?= base_url('media/berita') ?>" <?= ($activeCategory == 'berita' ? 'class="active"' : '') ?>>Berita</a></li>
                <li><a href="<?= base_url('media/kegiatan') ?>" <?= ($activeCategory == 'kegiatan' ? 'class="active"' : '') ?>>Kegiatan</a></li>
                <li><a href="<?= base_url('media/pengumuman') ?>" <?= ($activeCategory == 'pengumuman' ? 'class="active"' : '') ?>>Pengumuman</a></li>
                <li><a href="<?= base_url('media/publikasi') ?>" <?= ($activeCategory == 'publikasi' ? 'class="active"' : '') ?>>Publikasi Resmi</a></li>
            </ul>
        </nav>

        <section class="media-content">
            <?php if (!empty($contents)): ?>
                <div class="media-grid">
                    <?php foreach ($contents as $content): ?>
                        <div class="media-card">
                            <!-- Logika untuk gambar -->
                            <img src="<?= base_url(!empty($content['content_img']) ? 'uploads/konten/' . $content['content_img'] : 'img/mediaDefault.png') ?>" 
                                 alt="<?= esc($content['content_title']) ?>" />
                            <h2><?= esc($content['content_title']) ?></h2>
                            <p><?= esc(word_limiter($content['content_body'], 20)) ?></p>
                            <a href="<?= base_url('media/detail/' . $content['content_id']) ?>" class="read-more">Selengkapnya</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Tidak ada konten untuk kategori ini.</p>
            <?php endif; ?>
        </section>
    </main>

    <?= view('partials/footer') ?>
</body>
</html>
