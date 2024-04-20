$(document).ready(function(){
    // Hide all slider content except the first one
    $(".how-to-apply__container").not(":first").hide();

    // Show the first pagination item as active
    $(".how-to-apply__pagination-item").first().addClass("how-to-apply__pagination-item--active");

    $(".how-to-apply__pagination-item").click(function(){
        var index = $(this).index();

        console.log(index);

        // Remove active class from all pagination items
        $(".how-to-apply__pagination-item").removeClass("how-to-apply__pagination-item--active");

        // Add active class to the clicked pagination item
        $(this).addClass("how-to-apply__pagination-item--active");

        // Hide all slider content
        $(".how-to-apply__container").hide();


        // Check if the clicked pagination item is the first one
        $("#how-to-apply-" + index).show();

        // Add active class to the pagination item inside the shown slider content
        $("#how-to-apply-" + index + " .how-to-apply__pagination-item").eq(index).addClass("how-to-apply__pagination-item--active");
    });
});
