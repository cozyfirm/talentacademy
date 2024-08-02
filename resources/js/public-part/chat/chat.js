import { Notify } from './../../style/layout/notify.ts';
import { MqttInit } from './../../mqtt/mqtt-init.ts';
// import mqtt from "mqtt";
import mqtt from "mqtt"; // import namespace "mqtt"

// let mqtt = "./../../mqtt/mqtt.js";

console.log("Starting chat script ..");

$(document).ready(function(){
    let mqttConnected = false, mqttSubscribed = false, subscribedTopic = '';
    /* Decide should we scroll to end of div or not */
    let scrollToEnd = true;
    /* Do not attempt multiple fetches before listing messages */
    let allowMessageFetch = true;
    let defaultImage = 'silhouette.png';

    /* Get ID of logged user; Read from chat form */
    let loggedUserID = parseInt($("#loggedUserID").val());
    let apiToken = $('meta[name="api-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let conversationWrapper = $("#conversation-wrapper");

    const client   = mqtt.connect("wss://mqtt.cozyfirm.com:8083", MqttInit.options);
    client.on('error', (err) => { client.end() });
    client.on('reconnect', () => { console.log('Reconnecting...'); });
    client.on('connect', () => {
        mqttConnected = true;

        if(conversationWrapper.length){
            /* Subscribe to first channel */
            subscribedTopic = conversationWrapper.attr('hash');

            client.subscribe(subscribedTopic, { qos: 0 });
            mqttSubscribed = true;

            console.log("Connected to MQTT and subscribed to " + subscribedTopic);

            /* On connect, first time scroll to end */
            $('.conversation__wrapper__body').animate({ scrollTop: $('.conversation__wrapper__body').prop('scrollHeight') }, 0);
        }

        /* Main channel */
        client.subscribe(apiToken, { qos: 0 });
        console.log("Connected to MQTT and subscribed to " + apiToken);
    });

    let totalUnreadMessages = function (total){
        $("#number-of-unread-messages-m").text(total);
        $("#number-of-unread-messages-d").text(total);
    };

    client.on('message', (topic, message, packet) => {
        let response = JSON.parse(message.toString());
        let data = response['data'];

        console.log(data);

        if(response['code'] === '2000'){
            /* Message from active chat */
            appendMessage(response['data']['message']);
        }else{
            /* Other push notification messages */
            if(!conversationWrapper.length){
                /* Chat is not open */
                if(response['code'] === '2010'){
                    /* New chat message */
                    Notify.Me(["<b> " + data['sender']['name'] + " </b> <br>" + data['message']['message'], "chat", data['message']['hash']]);

                    /* Set total number of unread messages */
                    totalUnreadMessages(data['message']['totalUnread']);
                }
            }else{
                /**
                 *  If user is currently using chat, then:
                 *
                 *  1. This chat is open
                 *  2. This chat is not open
                 */

                if(response['code'] === '2010'){
                    /* New chat message */
                    
                    /* Set total number of unread messages */
                    totalUnreadMessages(data['message']['totalUnread']);

                    if(data['message']['hash'] !== subscribedTopic){
                        /* Not opened chat; Increase number of unread messages */

                        if(data['message']['is_group'] === 0){
                            /* Individual message */

                            $('.conversation__item[hash="'+data['message']['hash']+'"]')
                                .find(".unread_msg")
                                .removeClass('d-none')
                                .find("p").text(data['message']['unreadMessages']);

                            Notify.Me(["<b> " + data['sender']['name'] + " </b> <br>" + data['message']['message'], "chat", data['message']['hash']]);
                        }else{
                            Notify.Me(["<b> " + data['sender']['name'] + " (" + data['message']['conversation'] + ") </b> <br>" + data['message']['message'], "chat", data['message']['hash']]);
                        }
                    }
                }
            }
        }

        /* When message appears, and if this is the chat we want to work with */
    });

    let startConversationURI = '/dashboard/chat/start-conversation';
    let sendMessageUri = '/dashboard/chat/send-message';
    let fetchOldMessagesUri = '/dashboard/chat/fetch-old-messages';

    let getLastMsgID = function (){
        return $(".conversation__wrapper__body").children().last().attr('msg-id');
    };
    let getFirstMsgID = function (){
        return $(".conversation__wrapper__body").children().first().attr('msg-id');
    };

    let formMessageDom = function (className, id, body, image){
        if(className === 'user__message__w'){
            return $("<div>").attr('class', className).attr('id', 'message-id-' + id).attr('msg-id', id)
                .append(function (){
                    return $("<div>").attr('class', 'message__w')
                        .append(function (){
                            return $("<div>").attr('class', 'message_img_w')
                                .append(function (){
                                    return $("<img>").attr('src', '/files/images/public-part/users/' + image).attr('alt', 'Profile photo');
                                });
                        })
                        .append(function (){
                            return $("<div>").attr('class', 'message')
                                .append(function (){
                                    return $("<p>").text(body);
                                });
                        });
                });
        }else{
            return $("<div>").attr('class', className).attr('id', 'message-id-' + id).attr('msg-id', id)
                .append(function (){
                    return $("<div>").attr('class', 'message__w')
                        .append(function (){
                            return $("<div>").attr('class', 'message')
                                .append(function (){
                                    return $("<p>").text(body);
                                });
                        })
                        .append(function (){
                            return $("<div>").attr('class', 'message_img_w')
                                .append(function (){
                                    return $("<img>").attr('src', '/files/images/public-part/users/' + image).attr('alt', 'Profile photo');
                                });
                        });
                });
        }
    };
    /**
     * Append single message to chat
     * @param message
     */
    let appendMessage = function (message){
        let className = (parseInt(message['sender_id']) === loggedUserID) ? "user__message__w my__message__w" : "user__message__w";
        let image = (message['sender_rel']['photo_uri'] !== null) ? message['sender_rel']['photo_uri'] : defaultImage;

        $(".conversation__wrapper__body").append(function (){
            return formMessageDom(className, message['id'], message['body'], image);
        });

        if(scrollToEnd) $('.conversation__wrapper__body').animate({ scrollTop: $('.conversation__wrapper__body').prop('scrollHeight') }, 200);
    }
    /* This function is used to inject messages to chat */
    let injectMessages = function (messages, newConversation = false){
        if(newConversation){
            /* Remove all previous messages */
            $(".conversation__wrapper__body").empty();
        }

        for(let i=0; i<messages.length; i++){
            let className = (parseInt(messages[i]['sender_id']) === loggedUserID) ? "user__message__w my__message__w" : "user__message__w";
            let image = (messages[i]['sender_rel']['photo_uri'] !== null) ? messages[i]['sender_rel']['photo_uri'] : defaultImage;

            $(".conversation__wrapper__body").prepend(function (){
                return formMessageDom(className, messages[i]['id'], messages[i]['body'], image);
            });
        }

        /* Scroll to bottom of div */
        // $('.conversation__wrapper__body').scrollTop($('.conversation__wrapper__body').height())
        if(scrollToEnd)  $('.conversation__wrapper__body').animate({ scrollTop: $('.conversation__wrapper__body').prop('scrollHeight') }, 0);
    };

    /**
     *  Start conversation with user
     */
    $(".start__conversation").click(function (){
        let userId = $(this).attr('user-id');

        /* Unsubscribe from topic */
        if(mqttSubscribed){
            mqttSubscribed = false;
            client.unsubscribe(subscribedTopic);
        }

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

                    if(data['type'] === 'single'){
                        $("#chat-photo").attr('src', '/files/images/public-part/users/' + data['user']['photo']);
                    }else{
                        $("#chat-photo").attr('src', '/files/images/public-part/' + data['image']);
                    }

                    $("#chat-title").text(data['title']);
                    $("#conversation-wrapper").attr('hash', data['hash']);

                    if(mqttConnected){
                        subscribedTopic = data['hash'];

                        client.subscribe(data['hash'], { qos: 0 });
                        mqttSubscribed = true;
                    }

                    /* Allow scroll to the end */
                    scrollToEnd = true;

                    /* Messages */
                    injectMessages(data['messages'], true);

                    if(window.innerWidth <= 1000){
                        $(".conversation__wrapper").css('display', 'initial');
                    }

                    $('.conversation__item[hash="'+subscribedTopic+'"]')
                        .find(".unread_msg")
                        .addClass('d-none')
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
    /**
     *  Start a group conversation
     */
    $(".start-group-conversations").click(function (){
        let hash = $(this).attr('hash');

        if(mqttSubscribed){
            mqttSubscribed = false;
            client.unsubscribe(subscribedTopic);
        }

        $.ajax({
            url: startConversationURI,
            method: 'POST',
            dataType: "json",
            data: {
                group: true,
                hash: hash
            },
            success: function success(response) {
                let code = response['code'];
                if(code === '0000'){
                    let data = response['data'];

                    if(data['type'] === 'single'){
                        $("#chat-photo").attr('src', '/files/images/public-part/users/' + data['user']['photo']);
                    }else{
                        $("#chat-photo").attr('src', '/files/images/public-part/' + data['image']);
                    }

                    $("#chat-title").text(data['title']);
                    $("#conversation-wrapper").attr('hash', data['hash']);

                    if(mqttConnected){
                        subscribedTopic = data['hash'];

                        client.subscribe(data['hash'], { qos: 0 });
                        mqttSubscribed = true;
                    }

                    /* Allow scroll to the end */
                    scrollToEnd = true;

                    /* Messages */
                    injectMessages(data['messages'], true);

                    if(window.innerWidth <= 1000){
                        $(".conversation__wrapper").css('display', 'unset');
                    }
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    /**
     *  Send new message
     */
    let sendMessage = function (){
        let hash = $("#conversation-wrapper").attr('hash');
        let message = $("#chat-message");
        let messageVal = message.val();
        /* Remove message before success to prevent new line glitch */
        message.val("");

        $.ajax({
            url: sendMessageUri,
            method: 'POST',
            dataType: "json",
            data: {
                hash: hash,
                message: messageVal
            },
            success: function success(response) {
                let code = response['code'];
                if(code === '0000'){
                    message.val("");

                    /* If I send message, allow scroll to bottom */
                    scrollToEnd = true;
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    };

    $('body').on('click', '#send-chat-message', function() {
        sendMessage();
    });
    $(document).on('keypress',function(e) {
        if(e.which === 13 && !e.shiftKey) {
            if($("#chat-message").val() !== ""){
                sendMessage();
            }
        }
    });

    /**
     *  Detect scrolling
     */
    $('.conversation__wrapper__body').on('touchmove mousewheel', function(e){
        scrollToEnd = ($(this).scrollTop()) > ($('.conversation__wrapper__body').prop('scrollHeight') - $('.conversation__wrapper__body').height()  - 10);

        getLastMsgID();

        if($(this).scrollTop() < 10 && allowMessageFetch){
            allowMessageFetch = false;

            $.ajax({
                url: fetchOldMessagesUri,
                method: 'POST',
                dataType: "json",
                data: {
                    hash: $("#conversation-wrapper").attr('hash'),
                    firstMessageID: getFirstMsgID()
                },
                success: function success(response) {
                    allowMessageFetch = true;

                    let code = response['code'];
                    if(code === '0000'){
                        injectMessages(response['data']['messages'], false);
                        if(response['data']['messages'].length !== 0) $('.conversation__wrapper__body').animate({ scrollTop: 50 }, 0);
                    }else{
                        Notify.Me([response['message'], "warn"]);
                    }
                }
            });
        }else if($(this).scrollTop() > 10) allowMessageFetch = true;
    })


    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Mobile version of chat; Apply a bit of different rules
     */
    $(".arrow__back").click(function (){
        $(".conversation__wrapper").css('display', 'none');
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Set size of chat
     */

    if(window.innerWidth <= 1000){
        let groupChatHeight = $(".group__chats__wrapper").height();
        console.log("wee", groupChatHeight, window.innerHeight);

        $(".my__contacts__wrapper").height((window.innerHeight - groupChatHeight - 210));
    }
});
