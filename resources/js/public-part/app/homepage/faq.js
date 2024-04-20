$(document).ready(function(){
    $(".faq__list-item").click(function(){
        $(this).toggleClass("faq__list-item-answer--opened").find(".faq__list-item-answer").slideToggle();
        $(this).find("svg").toggleClass("faq--rotate-svg");
    });
});
