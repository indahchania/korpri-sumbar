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
        <div class="breadcrumb">
            <a href="<?= base_url('media') ?>">Media</a> &gt;
            <a href="<?= base_url('media/' . urlencode($content['category_name'])) ?>"><?= esc($content['category_name']) ?></a>
        </div>

        <div class="breadcrumb">
            <a href="<?= base_url('media') ?>">Media</a>
        </div>
        <div class="media-list">
            <a href="<?= base_url('media/berita') ?>" class="<?= ($activeCategory == 'berita' ? 'active' : '') ?>">Berita</a>
            <a href="<?= base_url('media/kegiatan') ?>" class="<?= ($activeCategory == 'kegiatan' ? 'active' : '') ?>">Kegiatan</a>
            <a href="<?= base_url('media/pengumuman') ?>" class="<?= ($activeCategory == 'pengumuman' ? 'active' : '') ?>">Pengumuman</a>
            <a href="<?= base_url('media/publikasi') ?>" class="<?= ($activeCategory == 'publikasi' ? 'active' : '') ?>">Publikasi Resmi</a>
        </div>

        <section class="media-content">
            <?php if (!empty($contents)): ?>
                <div class="media-grid">
                    <?php foreach ($contents as $content): ?>
                        <div class="media-card">
                            <!-- Logika untuk gambar -->
                            <img src="<?= base_url(!empty($content['content_img']) ? 'uploads/konten/' . $content['content_img'] : 'img/mediaDefault.png') ?>"
                                alt="<?= esc($content['content_title']) ?>" />
                            <h2><?= esc($content['content_title']) ?></h2>
                            <p>
                                <?= esc(strlen(html_entity_decode($content['content_body'])) > 125
                                    ? substr(html_entity_decode($content['content_body']), 0, 125) . '...'
                                    : html_entity_decode($content['content_body'])) ?>
                            </p>
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