$(document).ready(function(){
    // Hide all slider content except the first one
    $(".how-to-apply__container").not(":first").hide();

    // Show the first pagination item as active
    $(".how-to-apply__pagination-item").first().addClass("how-to-apply__pagination-item--active");

    $(".how-to-apply__pagination-item").click(function(){
        var index = $(this).index();

        // Remove active class from all pagination items
        $(".how-to-apply__pagination-item").removeClass("how-to-apply__pagination-item--active");

        // Add active class to the clicked pagination item
        $(this).addClass("how-to-apply__pagination-item--active");

        // Check if the clicked pagination item is the first one
        if (index === 0) {
            // Show the slider content corresponding to the clicked pagination item
            $("#how-to-apply-" + index).show();
        } else {
            // Hide all slider content
            $(".how-to-apply__container").hide();

            // Show the slider content corresponding to the clicked pagination item
            $("#how-to-apply-" + index).show();
        }

        // Add active class to the pagination item inside the shown slider content
        $("#how-to-apply-" + index + " .how-to-apply__pagination-item").eq(index).addClass("how-to-apply__pagination-item--active");
    });
});
