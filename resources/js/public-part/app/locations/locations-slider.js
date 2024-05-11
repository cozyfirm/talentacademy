$(document).ready(function (){
    /* ToDo */
    const locations = document.querySelector('.preview__locations_body');

    let isLocationMoved = false;

    if($(".preview__locations_body").length){
        let isDown = false;
        let startX;
        let scrollLeft;

        locations.addEventListener('mousedown', (e) => {
            isDown = true;
            locations.classList.add('active');
            startX = e.pageX - locations.offsetLeft;
            scrollLeft = locations.scrollLeft;

            isLocationMoved = false;
        });
        locations.addEventListener('mouseleave', () => {
            isDown = false;
            locations.classList.remove('active');
        });
        locations.addEventListener('mouseup', () => {
            isDown = false;
            locations.classList.remove('active');
        });
        locations.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - locations.offsetLeft;
            const walk = (x - startX) * 1; //scroll-fast
            locations.scrollLeft = scrollLeft - walk;

            isLocationMoved = true;
        });
    }
    /* When btn is pressed */
    $(".locations__navigation_previous").click(function (){
        let width = $(".single_location").outerWidth();

        if ($(window).width() <= 800){
            locations.scrollLeft = (locations.scrollLeft - width - 15);
        }else{
            locations.scrollLeft = (locations.scrollLeft - 505);
        }
    });
    $(".locations__navigation_next").click(function (){
        let width = $(".single_location").outerWidth();

        if ($(window).width() <= 800){
            locations.scrollLeft = (locations.scrollLeft + width + 15);
        }else{
            locations.scrollLeft = (locations.scrollLeft + 505);
        }
    });


    /* Go to URI */

    // $(document).on('click','.preview__session_single',function(){
    //     if(!isLocationMoved) window.location.href = $(this).attr('uri');
    // });

    $('.locations__map-toggle-icon-container').click(function(){
        $(this).parent().find('.locations__list-item-map').toggleClass('locations__list-item-map--opened');
    });
});

