$(document).ready(function (){
    let currentID = 1;

    let changeColor = function (){
        let wrapper = $(".programs__wrapper_colored");
        for(let i=1; i<=5; i++){
            wrapper.removeClass('programs__wrapper_colored_' + i);
        }

        wrapper.addClass('programs__wrapper_colored_' + currentID);
    }

    $(".apply-for-scholarship-next").click(function (){
        currentID ++;
        if(currentID > 5) currentID = 1;

        $(".single__program_wrapper").css('display', 'none');
        $(".single__program_wrapper-" + currentID).css('display', 'inline-flex');

        changeColor();
    });

    $(".apply-for-scholarship-previous").click(function (){
        currentID --;
        if(currentID < 1) currentID = 5;

        $(".single__program_wrapper").css('display', 'none');
        $(".single__program_wrapper-" + currentID).css('display', 'inline-flex');

        changeColor();
    });
});
