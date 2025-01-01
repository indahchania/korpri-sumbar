dashboard.php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KORPRI Sumatera Barat</title>
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
</head>

<body>

    <?= view('partials/header') ?>

    <!-- Main Section -->
    <main class="main-section">
        <img src="<?= base_url('img/korpri-main.png'); ?>" alt="Rumah Gadang" class="main-image">
        <div class="main-text">
            <a href="#" class="button-link" id="show-info">Selengkapnya</a>
        </div>
    </main>

    <!-- Info Section -->
    <section id="info-section" class="hidden">
        <h2>Apa Itu KORPRI?</h2>
        <p>Korps Pegawai Republik Indonesia (disingkat KORPRI) adalah organisasi di Indonesia yang anggotanya terdiri dari Aparatur Sipil Negara (ASN), pegawai Badan Usaha Milik Negara (BUMN), Badan Usaha Milik Daerah (BUMD), serta anak perusahaan dari kedua jenis badan usaha tersebut. Meski demikian, KORPRI sering kali dikaitkan langsung dengan Pegawai Negeri Sipil (PNS), mengingat kedudukan dan kegiatan KORPRI yang terkait erat dengan kedinasan. Organisasi ini dirancang sebagai wadah untuk mengoordinasikan, memperkuat solidaritas, dan memperjuangkan hak serta kesejahteraan para pegawai pemerintah.</p>
        <p>KORPRI didirikan pada tanggal 29 November 1971 melalui Keputusan Presiden Nomor 82 Tahun 1971, dengan tujuan utama untuk menghimpun seluruh pegawai pemerintahan Indonesia dalam satu wadah organisasi yang independen dari partai politik. Pada masa Orde Baru, KORPRI digunakan sebagai alat politik untuk mendukung kekuasaan pemerintah yang berkuasa pada saat itu. Namun, seiring dengan berlangsungnya reformasi, KORPRI mengalami perubahan signifikan, bertransformasi menjadi organisasi yang netral dan tidak berpihak kepada partai politik mana pun. Dengan perubahan ini, KORPRI berusaha untuk memperkokoh integritas dan profesionalisme para anggotanya dalam melayani masyarakat.</p>
        <p>Salah satu simbol penting dari organisasi ini adalah logonya, yang diciptakan oleh seniman pelukis Aming Prayitno. Logo ini mengandung makna solidaritas, dedikasi, dan integritas pegawai pemerintahan dalam melayani negara. Namun, tidak semua pegawai pemerintahan termasuk dalam keanggotaan KORPRI. Perangkat desa, misalnya, memiliki organisasi profesi mereka sendiri, yaitu Persatuan Perangkat Desa Indonesia (PPDI), yang terpisah dari KORPRI dan mewadahi kebutuhan serta aspirasi perangkat desa secara khusus.</p>
        <p>Selain menjalankan fungsi administratif, KORPRI juga aktif dalam program pengembangan dan pelatihan keterampilan anggotanya untuk meningkatkan kualitas pelayanan publik. Di samping itu, KORPRI terlibat dalam berbagai kegiatan sosial kemasyarakatan, seperti bantuan untuk korban bencana alam dan kegiatan kesejahteraan sosial lainnya. Dalam konteks politik, KORPRI memiliki peran penting dalam menjaga netralitas ASN, terutama menjelang pemilihan umum. ASN yang tergabung dalam KORPRI diwajibkan untuk tetap netral dan bekerja secara profesional demi kepentingan publik, bukan untuk partai politik tertentu. Netralitas ini menjadi bagian krusial dari upaya reformasi birokrasi di Indonesia yang bertujuan untuk menciptakan pelayanan publik yang lebih transparan dan adil.</p>
    </section>

    <!-- Structure Section -->
    <br>
    <br>
    <section id="struktur-organisasi-section">
        <h2>Struktur Organisasi</h2>
        <p>Struktur Organisasi KORPRI Sumatera Barat meliputi berbagai jenjang sebagai berikut:</p>
        <div class="struktur-organisasi-content">
            <?php if (!empty($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <div class="struktur-item">
                        <?php if (!empty($page['pages_img'])): ?>
                            <div class="struktur-thumbnail-wrapper">
                                <img src="<?= base_url('uploads/pages/' . esc($page['pages_img'])) ?>"
                                    alt="<?= esc($page['pages_title']) ?>"
                                    class="struktur-thumbnail">
                            </div>
                        <?php endif; ?>
                        <p><?= substr(strip_tags($page['pages_body']), 0, 450) ?>...</p>
                        <a href="<?= site_url('tentang/struktur-organisasi/' . $page['pages_id']) ?>" class="button-link">Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada data struktur organisasi.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- News Thumbnails-section -->
    <br>
    <br>
    <section id="newsThumbnails-section">
        <h2>KORPRI Sumatera Barat Terkini</h2>
        <div class="newsThumbnails-content">
            <?php if (!empty($contents)): ?>
                <?php foreach ($contents as $content): ?>
                    <div class="news-item">
                        <img src="<?= base_url(!empty($content['content_img']) ? 'uploads/konten/' . $content['content_img'] : 'img/mediaDefault.png') ?>"
                            alt="<?= esc($content['content_title']) ?>"
                            class="news-thumbnail">
                        <h3><?= esc($content['content_title']) ?></h3>
                        <p><?= substr(strip_tags($content['content_body']), 0, 125) ?>...</p>
                        <a href="<?= site_url('media/detail/' . $content['content_id']) ?>" class="button2-link">Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada berita terkini.</p>
            <?php endif; ?>
        </div>
    </section>

    <br>

    <?= view('partials/footer') ?>

    <script src="<?= base_url('js/main.js') ?>"></script>
</body>

</html>