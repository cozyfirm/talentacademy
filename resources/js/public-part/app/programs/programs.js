import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let privateSessions   = '/programs/get-ajax-private-sessions';
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

    $("body").on('click', '.fetch-private-sessions', function (){
        let date = $(this).attr('date');
        let program = $(this).attr('program-id');
        let $this = $(this);

        let wrapper = $(".program__timeline-items");
        $.ajax({
            url: privateSessions,
            method: 'POST',
            dataType: "json",
            data: {
                date: date,
                program: program
            },
            success: function success(response) {
                if(response['code'] === '0000'){
                    let sessions = response['data']['sessions'];
                    wrapper.empty();

                    for(let i=0; i<sessions.length; i++){
                        wrapper.append(function (){
                           return $("<div>").attr('class', 'program__timeline-item')
                               .append(function (){
                                   return $("<div>").attr('class', 'program__timeline-item-left')
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-left-time').text(sessions[i]['time_from_f']);
                                       })
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-left-tag').text(sessions[i]['type']);
                                       })
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-left-length')
                                               .append(function (){
                                                   return $("<img>").attr('src', '/files/images/svg-icons/time.svg');
                                               })
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-left-rectangle')
                                               })
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-left-duration').text(sessions[i]['duration'])
                                               })
                                       })
                               })
                               .append(function (){
                                   return $("<div>").attr('class', 'program__timeline-item-right')
                                       .append(function (){
                                           return $("<a>").attr('href', "/programs/preview-session/" + sessions[i]['id'])
                                               .append(function (){
                                                   return $("<h2>").attr('class', 'program__timeline-item-right-title').text(sessions[i]['title']);
                                               })
                                       })
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-right-item')
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-right-item-icon')
                                                       .append(function (){
                                                           return $("<img>").attr('src', '/files/images/svg-icons/program-item-icon-name.svg')
                                                       })
                                               })
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-right-item-text').text(sessions[i]['lecturer'])
                                               })
                                       })
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-right-item')
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-right-item-icon')
                                                       .append(function (){
                                                           return $("<img>").attr('src', '/files/images/svg-icons/program-item-icon-location.svg')
                                                       })
                                               })
                                               .append(function (){
                                                   return $("<div>").attr('class', 'program__timeline-item-right-item-text').text(sessions[i]['location'])
                                               })
                                       })
                                       .append(function (){
                                           return $("<div>").attr('class', 'program__timeline-item-right-description').html(sessions[i]['short_description']);
                                       })
                               });
                        });
                    }

                    $(".program__timeline-header-title").text("Dan " + response['data']['currentNoDay']);

                    /* Remove all classes */
                    $(".program__timeline-top-right-day-text").removeClass('active');
                    $(".program__timeline-top-right-day-number").removeClass('active');
                    /* Highlight */
                    $this.find('.program__timeline-top-right-day-text').addClass('active');
                    $this.find('.program__timeline-top-right-day-number').addClass('active');

                    $(".program__timeline-header-date").text(response['data']['day'] + ', ' + response['data']['date']);

                    $('html, body').animate({
                        scrollTop: $("#program-sessions").offset().top
                    }, 5);

                    // $.scrollTo($('#lu__sessions_wrapper'), 1000);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
});
