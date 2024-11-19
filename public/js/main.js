document.addEventListener("DOMContentLoaded", function() {
    const showInfoButton = document.getElementById("show-info");
    const mainSection = document.querySelector(".main-section");
    const infoSection = document.getElementById("info-section");
    const structureSection = document.getElementById("structure-section");
    const newsThumbnailsSection = document.getElementById("newsThumbnails-section");

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
        }
        showInfoButton.textContent = infoSection.classList.contains("show") ? "Sembunyikan" : "Selengkapnya";
    }

    // Event klik pada tombol "Selengkapnya"
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
        }
    });

    // Event scroll untuk memicu animasi fade dan tampil otomatis
    window.addEventListener("scroll", function() {
        const mainSectionBottom = mainSection.getBoundingClientRect().bottom;
        
        if (mainSectionBottom < window.innerHeight / 2 && infoSection.classList.contains("hidden")) {
            toggleInfoSection(true);
        } else if (mainSectionBottom >= window.innerHeight / 2 && infoSection.classList.contains("show")) {
            toggleInfoSection(false);
        }
    });
});
