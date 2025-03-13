document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('post-carousel');
    const items = document.querySelectorAll('.post-item');
    let currentIndex = 0;

    function showNextItem() {
        // Remove active class from current item
        items[currentIndex].querySelector('.new-post-card').classList.remove('active');
        
        // Move to the next item
        currentIndex = (currentIndex + 1) % items.length;

        // Add active class to the new current item
        items[currentIndex].querySelector('.new-post-card').classList.add('active');
        
        // Scroll the carousel to the new current item
        carousel.scrollTo({
            top: 0,
            left: items[currentIndex].offsetLeft,
            behavior: 'smooth'
        });
    }

    // Set interval to automatically show the next item every 3 seconds
    setInterval(showNextItem, 3000);

    // Initialize the first item as active
    items[currentIndex].querySelector('.new-post-card').classList.add('active');
});