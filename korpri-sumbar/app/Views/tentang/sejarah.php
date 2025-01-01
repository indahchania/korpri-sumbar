<!-- sejarah.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page['pages_title'] ?? 'Sejarah KORPRI Sumatera Barat') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/sejarah.css') ?>">
</head>
<body>
<div class="page-wrapper">
    <?= view('partials/header') ?> <!-- Menyertakan header -->

    <!-- Main Section -->
    <main class="main-section">
        <h1><?= esc($page['pages_title'] ?? 'Sejarah KORPRI Sumatera Barat') ?></h1>
        <p><i>Ditulis oleh <?= esc($page['pages_author'] ?? 'Admin') ?> pada <?= date('d M Y', strtotime($page['pages_posted'] ?? 'now')) ?></i></p>
        <div class="content">
            <?= $page['pages_body'] ?? '<p>Konten sejarah belum tersedia.</p>' ?>
        </div>
    </main>

    <?= view('partials/footer') ?> <!-- Menyertakan footer -->
</div>
</body>
</html>
