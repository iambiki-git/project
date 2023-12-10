const stars = document.querySelectorAll(".star");
const ratingInput = document.getElementById("selected-rating");

stars.forEach(star => {
    star.addEventListener("click", function () {
        const selectedRating = this.getAttribute("data-rating");
        ratingInput.value = selectedRating;

        stars.forEach(s => {
            if (s.getAttribute("data-rating") <= selectedRating) {
                s.innerHTML = "&#9733;";
                s.style.color = "gold"; // Change color to gold
            } else {
                s.innerHTML = "&#9734;";
                s.style.color = "black"; // Reset color for non-selected stars
            }
        });
    });
});



