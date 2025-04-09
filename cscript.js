document.addEventListener('DOMContentLoaded', function() {
   
    const fadeInElements = document.querySelectorAll('.fade-in');
    
   
    fadeInElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = 1;
        }, index * 500); 
    });
});
