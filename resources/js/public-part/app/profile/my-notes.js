import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){
    let removeMyNote = '/dashboard/my-notes/remove-my-note';

    $(".my__note__header").click(function (){
        let arrow = $(this).find(".fa-arrow");

        if($(this).parent().hasClass('active')){
            $(this).parent().removeClass('active');
            // arrow.addClass('fa-chevron-up').removeClass('fa-chevron-down');
        }else{
            $(this).parent().addClass('active');
            // arrow.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });

    $(".remove__my_note").click(function (){
        let id = $(this).attr('note-id');
        let session_id = $(this).attr('session-id');
        let $_this = $(this);

        $.ajax({
            url: removeMyNote,
            method: 'POST',
            dataType: "json",
            data: {
                id: id
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    if(response['data']['left'] === 0){
                        /* Remove parent */
                        $_this.parent().parent().parent().remove();
                    }else{
                        /* Remove only note */
                        $_this.parent().remove();

                        /* Update number of notes */
                        $("#notes__count_" + session_id).text(response['data']['left']);
                    }

                    $("#number-of-notes").text(response['data']['totalLeft']);

                    Notify.Me([response['message'], "success"]);
                }else{
                    /* Error */
                }
            }
        });
    });

});
