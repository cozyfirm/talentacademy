$(document).ready(function (){
    /* ToDo */
    const slider = document.querySelector('.slider_w');
    const slider_2 = document.querySelector('.slider_w_2');

    let isBlogMoved = false;

    if($(".slider_w").length){
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1; //scroll-fast
            slider.scrollLeft = scrollLeft - walk;
            console.log(walk);
        });
    }
    /* When btn is pressed */
    $(".p__sbw_btn_previous").click(function (){
        let width = $(".single__presenter").width();

        slider.scrollLeft = slider.scrollLeft - width - 20;
    });
    $(".p__sbw_btn_next").click(function (){
        let width = $(".single__presenter").width();
        console.log(width);

        slider.scrollLeft = slider.scrollLeft + width + 20;
    });

    /* Blog slider */
    if($(".slider_w_2").length){
        let isDown2 = false;
        let startX2;
        let scrollLeft2;

        slider_2.addEventListener('mousedown', (e) => {
            isDown2 = true;
            slider_2.classList.add('active');
            startX2 = e.pageX - slider_2.offsetLeft;
            scrollLeft2 = slider_2.scrollLeft;

            isBlogMoved = false;
        });
        slider_2.addEventListener('mouseleave', () => {
            isDown2 = false;
            slider_2.classList.remove('active');
        });
        slider_2.addEventListener('mouseup', () => {
            isDown2 = false;
            slider_2.classList.remove('active');
        });
        slider_2.addEventListener('mousemove', (e) => {
            if(!isDown2) return;
            e.preventDefault();
            const x2 = e.pageX - slider_2.offsetLeft;
            const walk2 = (x2 - startX2) * 1; //scroll-fast
            slider_2.scrollLeft = scrollLeft2 - walk2;

            isBlogMoved = true;

            console.log(walk2);
        });
    }

    /* Go to URI */
    $(document).on('click','.blog__item, .news__list-item',function(){
        if(!isBlogMoved) window.location.href = $(this).attr('uri');
    });

    /* When btn is pressed */
    $(".blog_scroll_previous").click(function (){
        let width = $(".news__list-item").width();

        slider_2.scrollLeft = slider_2.scrollLeft - width - 42;
    });
    $(".blog_scroll_next").click(function (){
        let width = $(".news__list-item").width();
        console.log(width);

        slider_2.scrollLeft = slider_2.scrollLeft + width + 42;
    });
});

