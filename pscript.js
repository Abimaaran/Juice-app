document.addEventListener('DOMContentLoaded', function() {
    var addToCartButtons = document.getElementsByClassName('btn-outline-primary');
    var buyButtons = document.getElementsByClassName('btn-primary');

    for (var i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener('click', function() {
            alert('Added to cart!');
        });
    }

    for (var j = 0; j < buyButtons.length; j++) {
        buyButtons[j].addEventListener('click', function() {
            alert('Purchased!');
        });
    }
});
