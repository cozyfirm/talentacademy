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
});
