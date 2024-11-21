<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($content['content_title']) ?> - KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/mediaDetail.css') ?>">
</head>

<body>
    <?= view('partials/header') ?>

    <main class="detail-section">
        <article class="detail-card">
            <!-- Navigasi Breadcrumb -->
            <nav class="breadcrumb">
                <a href="<?= base_url() ?>">KORPRI Sumatera Barat</a> > 
                <a href="<?= base_url('media/' . esc($content['category_name'])) ?>"><?= esc($content['category_name']) ?></a>
            </nav>

            <!-- Judul Besar -->
            <h1 class="detail-title"><?= esc($content['content_title']) ?></h1>

            <!-- Penulis dan Tanggal -->
            <div class="meta-info">
                <p class="author">
                    <?= esc($content['content_author'] ?? 'Admin') ?> - KORPRI Sumatera Barat
                </p>
                <p class="date">
                    Posted: 
                    <span><?= isset($content['content_posted']) ? date('l, d M Y H:i', strtotime($content['content_posted'])) . ' ' . date_default_timezone_get() : 'Tanggal tidak tersedia' ?></span>
                </p>
                <p class="date">
                    Updated: 
                    <span><?= isset($content['content_updated']) ? date('l, d M Y H:i', strtotime($content['content_updated'])) . ' ' . date_default_timezone_get() : 'Belum pernah diperbarui' ?></span>
                </p>
            </div>

            <!-- Gambar Konten -->
            <img src="<?= base_url(!empty($content['content_img']) ? 'uploads/konten/' . $content['content_img'] : 'img/mediaDefault.png') ?>"
                alt="<?= esc($content['content_title']) ?>" class="content-image" />

            <!-- Isi Konten -->
            <div class="content-body">
                <?= nl2br(esc($content['content_body'])) ?>
            </div>
        </article>
    </main>

    <?= view('partials/footer') ?>
</body>

</html>
