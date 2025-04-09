document.addEventListener("DOMContentLoaded", function() {
    var seeMoreElements = document.getElementsByClassName("see-more");

    for (var i = 0; i < seeMoreElements.length; i++) {
        (function() {
            var element = seeMoreElements[i];
            element.addEventListener("click", function() {
                var ingredients = element.nextElementSibling;

                if (ingredients.style.display === "block" || ingredients.style.display === "") {
                    ingredients.style.display = "none";
                    element.textContent = "See More";
                } else {
                    ingredients.style.display = "block";
                    element.textContent = "See Less";
                }
            });
        })();
    }
});
