$(document).ready(function (){
    let currentID = 1;

    $(".apply-for-scholarship-next").click(function (){
        currentID ++;
        if(currentID > 5) currentID = 1;

        $(".single__program_wrapper").css('display', 'none');
        $(".single__program_wrapper-" + currentID).css('display', 'inline-flex');
    });

    $(".apply-for-scholarship-previous").click(function (){
        currentID --;
        if(currentID < 1) currentID = 5;

        $(".single__program_wrapper").css('display', 'none');
        $(".single__program_wrapper-" + currentID).css('display', 'inline-flex');
    });
});
