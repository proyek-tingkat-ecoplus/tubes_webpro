document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('profileCarousel');
    const profileCards = document.querySelectorAll('.profile-card');

    const colors = ['#2b592a', '#ffffff', '#2b592a', '#ffffff'];

    carousel.addEventListener('slide.bs.carousel', function(event) {
        const index = event.to;

        profileCards.forEach((card, i) => {
            card.style.backgroundColor = colors[i % colors.length];
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    // Tangkap elemen form
    const form = document.getElementById("contactForm");

    // Tangkap event submit pada form
    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Mencegah form dari reload halaman

        // Tampilkan pesan sukses
        alert("Formulir berhasil terkirim!");

        // Reset form (opsional, jika ingin mengosongkan form setelah submit)
        form.reset();
    });
});
