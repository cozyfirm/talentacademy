document.addEventListener("DOMContentLoaded", function() {
    // Hide all slider content except the first one
    const containers = document.querySelectorAll(".how-to-apply__container");
    containers.forEach((container, index) => {
        if (index !== 0) {
            container.style.display = "none";
        }
    });

    return;
    // Show the first pagination item as active
    const paginationItems = document.querySelectorAll(".how-to-apply__pagination-item");
    paginationItems[0].classList.add("how-to-apply__pagination-item--active");

    paginationItems.forEach((item, index) => {
        item.addEventListener("click", function() {
            console.log(index);

            // Calculate the correct index for the content and inner pagination items
            const contentIndex = index % 4;

            // Remove active class from all pagination items
            paginationItems.forEach(paginationItem => {
                paginationItem.classList.remove("how-to-apply__pagination-item--active");
            });

            // Add active class to the clicked pagination item
            item.classList.add("how-to-apply__pagination-item--active");

            // Hide all slider content
            containers.forEach(container => {
                container.style.display = "none";
            });

            // Show the correct slider content
            document.getElementById("how-to-apply-" + contentIndex).style.display = "block";

            // Add active class to the pagination item inside the shown slider content
            const innerPaginationItems = document.querySelectorAll("#how-to-apply-" + contentIndex + " .how-to-apply__pagination-item");
            if (innerPaginationItems[contentIndex]) {
                innerPaginationItems[contentIndex].classList.add("how-to-apply__pagination-item--active");
            }
        });
    });
});
