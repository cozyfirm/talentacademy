$(document).ready(function (){
    /* ToDo */
    const sessions = document.querySelector('.preview__session_rest_of');

    let isSessionMoved = false;

    if($(".preview__session_rest_of").length){
        let isDown = false;
        let startX;
        let scrollLeft;

        sessions.addEventListener('mousedown', (e) => {
            isDown = true;
            sessions.classList.add('active');
            startX = e.pageX - sessions.offsetLeft;
            scrollLeft = sessions.scrollLeft;

            isSessionMoved = false;
        });
        sessions.addEventListener('mouseleave', () => {
            isDown = false;
            sessions.classList.remove('active');
        });
        sessions.addEventListener('mouseup', () => {
            isDown = false;
            sessions.classList.remove('active');
        });
        sessions.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - sessions.offsetLeft;
            const walk = (x - startX) * 1; //scroll-fast
            sessions.scrollLeft = scrollLeft - walk;

            isSessionMoved = true;
        });
    }
    /* When btn is pressed */
    $(".previous__session_btn").click(function (){
        let width = $(".preview__session_single").outerWidth();

        if ($(window).width() <= 800){
            sessions.scrollLeft = (sessions.scrollLeft - width - 15);
        }else{
            sessions.scrollLeft = (sessions.scrollLeft - 507);
        }
    });
    $(".next__session_btn").click(function (){
        let width = $(".preview__session_single").outerWidth();

        if ($(window).width() <= 800){
            sessions.scrollLeft = (sessions.scrollLeft + width - 15);
        }else{
            sessions.scrollLeft = (sessions.scrollLeft + 507);
        }
    });


    /* Go to URI */

    $(document).on('click','.preview__session_single',function(){
        if(!isSessionMoved) window.location.href = $(this).attr('uri');
    });

});

