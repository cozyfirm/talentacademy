$(document).ready(function(){
    $(".faq__list-item").click(function(){
        $("svg").removeClass("faq--rotate-svg");


        $(".faq__list-item").not($(this)).removeClass("faq__list-item-answer--opened").find(".faq__list-item-answer").slideUp();

        $(this).toggleClass("faq__list-item-answer--opened").find(".faq__list-item-answer").slideToggle();
        $(this).find("svg").toggleClass("faq--rotate-svg");
    });

    /* Slider */

    let state = 1;
    setInterval(function(){
        if($(".hero-section__upper-section-avatars-container").length){
            if(!state){
                $(".hero-section__upper__lecturers").addClass('faded');
                $(".hero-section__upper__days").removeClass('faded');
            }else{
                $(".hero-section__upper__days").addClass('faded');
                $(".hero-section__upper__lecturers").removeClass('faded');
            }

            state = !state;
            // console.log("we are here");
        }
    }, 3000);
});
