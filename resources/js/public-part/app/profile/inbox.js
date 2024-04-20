$(document).ready(function (){
    $(".msg_wrapper").click(function (){
        let arrow = $(this).find(".fa-arrow");

        if($(this).find('.msg_body').hasClass('d-none')){
            $(this).find('.msg_body').removeClass('d-none');
            arrow.addClass('fa-chevron-up').removeClass('fa-chevron-down');
        }else{
            $(this).find('.msg_body').addClass('d-none');
            arrow.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });
});
