<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/kontak.css') ?>">
</head>

<body>

    <?= view('partials/header') ?>

    <main class="kontak-section">
        <div class="breadcrumb">
            <a href="<?= base_url() ?>">Home</a> &gt;
            <a href="<?= base_url('kontak') ?>">Kontak Kami</a>
        </div>

        <h1>Kontak Kami</h1>

        <!-- Info Kontak (Grid 1 baris 3 kolom) -->
        <div class="kontak-info">
            <div class="kontak-item">
                <h2>Alamat</h2>
                <p>Jl. Adinegoro, Air Tawar Bar., Kec. Padang Utara, Kota Padang, Sumatera Barat</p>
            </div>
            <div class="kontak-item">
                <h2>Telepon</h2>
                <p>+62 123 456 7890</p>
            </div>
            <div class="kontak-item">
                <h2>Email</h2>
                <p>info@korpri-sumbar.or.id</p>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="maps-section">
            <div class="maps-container">
                <!-- Google Maps Embed iframe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11448.524343640265!2d100.349228!3d-0.90333!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4bf4ccfb7c825%3A0x3e3db987b0894f2e!2sKantor%20Korpri!5e1!3m2!1sen!2sid!4v1732252604828!5m2!1sen!2sid"
                    width="600"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Form Kontak (Pesan) -->
        <div class="kontak-form">
            <h2>Kirim Pesan</h2>
            <form action="<?= base_url('kontak/send') ?>" method="post">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </main>

    <?= view('partials/footer') ?>

</body>

</html>