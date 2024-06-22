$(document).ready(function (){
    let markMessageAsReadUri = '/dashboard/mark-message-as-read';

    $(".msg_wrapper").click(function (){
        let arrow = $(this).find(".fa-arrow");

        if($(this).find('.msg_body').hasClass('d-none')){
            $(this).find('.msg_body').removeClass('d-none');
            arrow.addClass('fa-chevron-up').removeClass('fa-chevron-down');
        }else{
            $(this).find('.msg_body').addClass('d-none');
            arrow.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }

        /* Mark it as read */
        let id = $(this).attr('attr-id');
        $(this).find('.msg__img').attr('src', '/files/images/public-part/msgtag.png');

        $.ajax({
            url: markMessageAsReadUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: id
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    if(response['data']['unread'] === 0){
                        $("#number-of-notifications-w").remove();
                    }else{
                        $("#number-of-notifications").text(response['data']['unread']);
                    }
                }else{

                }
            }
        });
    });
});
