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
