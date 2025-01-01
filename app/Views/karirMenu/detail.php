<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($career['career_title']) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/karirMenu.css') ?>">
</head>

<body>
    <?= view('partials/header') ?>

    <main class="main-section">
        <!-- Breadcrumb Navigasi -->
        <div class="breadcrumb">
            Karir &gt; 
            <a href="<?= base_url('karirMenu?category=' . urlencode($career['category_name'])) ?>">
                <?= esc($career['category_name']) ?>
                </a>
        </div>

        <div class="container">
            <h1><?= esc($career['career_title']) ?></h1>
            <p class="career-meta">
                Oleh: <?= esc($career['career_author']) ?> | <?= date('d M Y', strtotime($career['career_posted'])) ?>
            </p>
            <img src="<?= base_url('uploads/karir/' . (!empty($career['career_img']) ? esc($career['career_img']) : 'mediaDefault.png')) ?>" 
                 alt="<?= esc($career['career_title']) ?>" 
                 class="detail-career-image">
            <div class="career-body">
                <?= $career['career_body'] ?>
            </div>
        </div>
    </main>

    <?= view('partials/footer') ?>
</body>

</html>
