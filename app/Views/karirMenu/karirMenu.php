<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karir - <?= esc($selectedCategory) ?: 'Semua Kategori' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/karirMenu.css') ?>">
</head>

<body>
    <?= view('partials/header') ?>

    <main class="main-section">
        <!-- Breadcrumb Navigasi -->
        <div class="breadcrumb">
            <a href="<?= base_url('karirMenu') ?>">Karir</a> &gt; 
            <a href="<?= base_url('karirMenu?category=' . urlencode($selectedCategory)) ?>"><?= esc($selectedCategory) ?></a>
        </div>

            <div class="career-list">
                <?php if (!empty($career)): ?>
                    <?php foreach ($career as $job): ?>
                        <div class="career-item">
                            <img src="<?= base_url('uploads/karir/' . (!empty($job['career_img']) ? esc($job['career_img']) : 'mediaDefault.png')) ?>" 
                                alt="<?= esc($job['career_title']) ?>" 
                                class="career-image">
                            <h2 class="career-title"><?= esc($job['career_title']) ?></h2>
                            <p class="career-meta">
                                Oleh: <?= esc($job['career_author']) ?> | <?= date('d M Y', strtotime($job['career_posted'])) ?> | <?= esc($job['category_name']) ?>
                            </p>
                            <p class="career-description"><?= character_limiter(strip_tags($job['career_body']), 150) ?></p>
                            <a href="<?= base_url('karirMenu/detail/' . $job['career_id']) ?>" class="button-link">Selengkapnya</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-data">Tidak ada data untuk kategori <?= esc($selectedCategory) ?>.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?= view('partials/footer') ?>
</body>

</html>
