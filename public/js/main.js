document.addEventListener("DOMContentLoaded", function () {
    const showInfoButton = document.getElementById("show-info");
    const mainSection = document.querySelector(".main-section");
    const infoSection = document.getElementById("info-section");
    const structureSection = document.getElementById("structure-section");
    const newsThumbnailsSection = document.getElementById("newsThumbnails-section");

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
        }
        showInfoButton.textContent = infoSection.classList.contains("show") ? "Sembunyikan" : "Selengkapnya";
    }

    // Event klik pada tombol "Selengkapnya"
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
        }
    });

    // Event scroll untuk memicu animasi fade dan tampil otomatis
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
    });
});
