<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page['pages_title'] ?? 'Judul Halaman') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <?= view('partials/header') ?>
    </header>

    <main class="main-section">
        <h1><?= esc($page['pages_title']) ?></h1>
        <p><i>Ditulis oleh <?= esc($page['pages_author']) ?> pada <?= date('d M Y', strtotime($page['pages_posted'])) ?></i></p>
        <div class="content">
            <?= $page['pages_body'] ?>
        </div>
    </main>

    <footer>
        <?= view('partials/footer') ?>
    </footer>
</body>
</html>
