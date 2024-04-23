$(document).ready(function(){
    $(".faq__list-item").click(function(){
        $("svg").removeClass("faq--rotate-svg");
        $(".faq__list-item").not($(this)).removeClass("faq__list-item-answer--opened").find(".faq__list-item-answer").slideUp();
        $(this).toggleClass("faq__list-item-answer--opened").find(".faq__list-item-answer").slideToggle();
        $(this).find("svg").toggleClass("faq--rotate-svg");
    });
});
