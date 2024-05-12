import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let saveUri   = '/programs/save-session-note';
    let deleteUri = '/programs/delete-session-note';

    $(".save-note").click(function (){
        let note = $("#note");

        if(note.val() === ''){
            Notify.Me(["Molimo unesite bilješku!", "warn"]);
            return;
        }

        $.ajax({
            url: saveUri,
            method: 'POST',
            dataType: "json",
            data: {
                session_id: $("#session_id").val(),
                note: note.val()
            },
            success: function success(response) {
                if(response['code'] === '0000'){
                    let respNote = response['data']['note'];

                    $(".my_notes__note").append(function (){
                        return $("<div>").attr('class', 'my_note')
                            .append(function (){
                                return $("<div>").attr('class', 'my_note_time')
                                    .append(function (){
                                        return $("<h5>").text(respNote['time']);
                                    });
                            })
                            .append(function (){
                                return $("<div>").attr('class', 'my_note_delete').attr('itemid', respNote['id'])
                                    .append(function (){
                                        return $("<i>").attr('class', 'fa fa-times');
                                    });
                            })
                            .append(function (){
                               return $("<p>").text(respNote['note'])
                            });
                    }).removeClass('d-none');

                    note.val("");
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    $("body").on('click', '.my_note_delete', function (){
        let id = $(this).attr('itemid');
        let $this = $(this);

        $.ajax({
            url: deleteUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: id
            },
            success: function success(response) {
                if(response['code'] === '0000'){
                    let respNote = response['data']['note'];
                    $this.parent().remove();

                    /* Check if we should hide parent */
                    if($(".my_notes__note").find(".my_note").length === 0) $(".my_notes__note").addClass('d-none');

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    const sessions_scroll = document.querySelector('.sessions__scroll_body');
    let isSessionMoved = false;

    if($(".sessions__scroll_body").length){
        let isDown = false;
        let startX;
        let scrollLeft;

        sessions_scroll.addEventListener('mousedown', (e) => {
            isDown = true;
            sessions_scroll.classList.add('active');
            startX = e.pageX - sessions_scroll.offsetLeft;
            scrollLeft = sessions_scroll.scrollLeft;

            isSessionMoved = false;
        });
        sessions_scroll.addEventListener('mouseleave', () => {
            isDown = false;
            sessions_scroll.classList.remove('active');
        });
        sessions_scroll.addEventListener('mouseup', () => {
            isDown = false;
            sessions_scroll.classList.remove('active');
        });
        sessions_scroll.addEventListener('mousemove', (e) => {
            // alert("wee");
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - sessions_scroll.offsetLeft;
            const walk = (x - startX) * 1; //scroll-fast
            sessions_scroll.scrollLeft = scrollLeft - walk;

            isSessionMoved = true;
        });
    }
    /* When btn is pressed */
    $(".pss_btn").click(function (){
        let width = $(".sessions__scroll_single").outerWidth();

        if ($(window).width() <= 800){
            sessions_scroll.scrollLeft = (sessions_scroll.scrollLeft - width - 15);
        }else{
            sessions_scroll.scrollLeft = (sessions_scroll.scrollLeft - 505);
        }
    });
    $(".nss_btn").click(function (){
        let width = $(".sessions__scroll_single").outerWidth();

        if ($(window).width() <= 800){
            sessions_scroll.scrollLeft = (sessions_scroll.scrollLeft + width + 15);
        }else{
            sessions_scroll.scrollLeft = (sessions_scroll.scrollLeft + 505);
        }
    });


    /* Go to URI */

    $(document).on('click','.sessions__scroll_single',function(){
        if(!isSessionMoved) window.location.href = $(this).attr('uri');
    });
});
