import { Notify } from './../../style/layout/notify.ts';
import { Validator } from "../../style/layout/validator.ts";

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let startConversationURI = '/dashboard/chat/start-conversation';
    let sendMessageUri = '/dashboard/chat/send-message';

    /**
     *  Start conversation with user
     */
    $(".start__conversation").click(function (){
        let userId = $(this).attr('user-id');

        console.log(userId);

        $.ajax({
            url: startConversationURI,
            method: 'POST',
            dataType: "json",
            data: {
                userId: userId
            },
            success: function success(response) {
                let code = response['code'];
                if(code === '0000'){
                    let data = response['data'];
                    console.log(data);

                    if(data['type'] === 'single'){
                        $("#chat-photo").attr('src', '/files/images/public-part/users/' + data['user']['photo']);
                    }

                    $("#chat-title").text(data['title']);
                    $("#conversation-wrapper").attr('hash', data['hash']);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /**
     *  Send new message
     */
    $('body').on('click', '#send-chat-message', function() {
        let hash = $("#conversation-wrapper").attr('hash');
        let message = $("#chat-message");

        $.ajax({
            url: sendMessageUri,
            method: 'POST',
            dataType: "json",
            data: {
                hash: hash,
                message: message.val()
            },
            success: function success(response) {
                let code = response['code'];
                if(code === '0000'){

                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

});
