<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function () {
=======
document.addEventListener("DOMContentLoaded", function() {
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
    const showInfoButton = document.getElementById("show-info");
    const mainSection = document.querySelector(".main-section");
    const infoSection = document.getElementById("info-section");
    const structureSection = document.getElementById("structure-section");
    const newsThumbnailsSection = document.getElementById("newsThumbnails-section");

<<<<<<< HEAD
    // Pastikan elemen yang diperlukan ada
    if (!showInfoButton || !mainSection || !infoSection) {
        console.error("Elemen penting tidak ditemukan di halaman.");
        return;
    }

    // Inisialisasi dengan kelas 'hidden' pada infoSection
    infoSection.classList.add("hidden");

    // Fungsi untuk menampilkan atau menyembunyikan infoSection
    function toggleInfoSection(show) {
        if (show) {
            infoSection.classList.remove("hidden");
            setTimeout(() => infoSection.classList.add("show"), 50); // Tambahkan animasi fade-in
            mainSection.classList.add("fade-out");
        } else {
            infoSection.classList.remove("show");
            setTimeout(() => infoSection.classList.add("hidden"), 1200); // Delay sebelum disembunyikan
            mainSection.classList.remove("fade-out"); // Pastikan fade-out dihapus
=======
    // Inisialisasi dengan kelas 'hidden' dan animasi scale pada infoSection
    mainSection.classList.add("fade-out");
    infoSection.classList.add("hidden", "info-section-visible");
    structureSection.classList.remove("hidden");
    newsThumbnailsSection.classList.remove("hidden");
    
    function smoothScrollTo(target) {
        const offset = 150;
        const position = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({
            top: position,
            behavior: "smooth"
        });
    }

    // Fungsi untuk menampilkan atau menyembunyikan infoSection dengan animasi
    function toggleInfoSection(show) {
        if (show) {
            infoSection.classList.remove("hidden");
            setTimeout(() => infoSection.classList.add("show"), 50);
            mainSection.classList.add("hidden-fade");
        } else {
            infoSection.classList.remove("show");
            setTimeout(() => infoSection.classList.add("hidden"), 800);
            mainSection.classList.remove("hidden-fade");
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
        }
        showInfoButton.textContent = infoSection.classList.contains("show") ? "Sembunyikan" : "Selengkapnya";
    }

    // Event klik pada tombol "Selengkapnya"
<<<<<<< HEAD
    showInfoButton.addEventListener("click", function (event) {
        event.preventDefault();
        const isShowing = infoSection.classList.contains("show");
        toggleInfoSection(!isShowing);

        // Scroll ke infoSection jika ditampilkan
        if (!isShowing) {
            const offset = 150; // Jarak offset agar konten tidak menempel ke atas
            const position = infoSection.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({
                top: position,
                behavior: "smooth",
            });
=======
    showInfoButton.addEventListener("click", function(event) {
        event.preventDefault();
        const isShowing = infoSection.classList.contains("show");
        toggleInfoSection(!isShowing);
        
        // Scroll ke infoSection jika ditampilkan
        if (!isShowing) {
            const offset = 155; // Atur jarak dari atas agar sesuai kebutuhan
            const elementPosition = infoSection.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = elementPosition - offset;
            
            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });

            // Pastikan animasi dimulai setelah posisi scroll tercapai
            setTimeout(() => {
                infoSection.classList.add("show");
            }, 500); // Delay yang disesuaikan agar animasi muncul tepat waktu
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
        }
    });

    // Event scroll untuk memicu animasi fade dan tampil otomatis
<<<<<<< HEAD
    let lastScrollTop = 0; // Menyimpan posisi scroll terakhir
    window.addEventListener("scroll", function () {
        const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScrollTop > lastScrollTop) {
            // Scroll ke bawah: Tampilkan infoSection dan sembunyikan mainSection
            if (infoSection.classList.contains("hidden")) {
                toggleInfoSection(true);
            }
        } else {
            // Scroll ke atas: Sembunyikan infoSection dan tampilkan mainSection kembali
            if (infoSection.classList.contains("show")) {
                infoSection.classList.remove("show");
                setTimeout(() => infoSection.classList.add("hidden"), 1200); // Delay sebelum elemen disembunyikan
                mainSection.classList.remove("fade-out"); // Tampilkan kembali mainSection
            }
        }

        lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop; // Update posisi scroll
=======
    window.addEventListener("scroll", function() {
        const mainSectionBottom = mainSection.getBoundingClientRect().bottom;
        
        if (mainSectionBottom < window.innerHeight / 2 && infoSection.classList.contains("hidden")) {
            toggleInfoSection(true);
        } else if (mainSectionBottom >= window.innerHeight / 2 && infoSection.classList.contains("show")) {
            toggleInfoSection(false);
        }
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
    });
});
