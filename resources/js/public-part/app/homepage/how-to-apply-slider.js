document.addEventListener("DOMContentLoaded", function() {
    // Get all slider containers
    var containers = document.querySelectorAll(".how-to-apply__container");

    // Hide all slider content except the first one
    for (var i = 1; i < containers.length; i++) {
        containers[i].style.display = "none";
    }

    // Show the first pagination item as active
    var paginationItems = document.querySelectorAll(".how-to-apply__pagination-item");
    paginationItems[0].classList.add("how-to-apply__pagination-item--active");

    // Add click event listener to pagination items
    paginationItems.forEach(function(item, index) {
        item.addEventListener("click", function() {
            console.log(index);

            // Remove active class from all pagination items
            paginationItems.forEach(function(item) {
                item.classList.remove("how-to-apply__pagination-item--active");
            });

            // Add active class to the clicked pagination item
            this.classList.add("how-to-apply__pagination-item--active");

            // Hide all slider content
            containers.forEach(function(container) {
                container.style.display = "none";
            });

            // Show the corresponding slider content
            containers[index].style.display = "block";

            // Add active class to the pagination item inside the shown slider content
            var paginationItemsInside = containers[index].querySelectorAll(".how-to-apply__pagination-item");
            paginationItemsInside[index].classList.add("how-to-apply__pagination-item--active");
        });
    });
});
