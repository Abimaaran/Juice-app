document.addEventListener('DOMContentLoaded', function() {

    const fadeInElements = document.querySelectorAll('.fade-in');
    
   
    fadeInElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = 1;
        }, index * 500); 
    });
});

let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    const offset = -currentSlide * 100 / 3;
    const carouselInner = document.querySelector('.carousel-inner');
    carouselInner.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

setInterval(nextSlide, 3000); 
