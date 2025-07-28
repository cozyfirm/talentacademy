import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";
import {post} from "axios";

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadMoreUri  = '/lecturers/load-more';
    let loadMoreArchiveUri  = '/archive/lecturers/load-more';

    let filterByName = '/lecturers/filter-by-name';
    let filterByNameArchive = '/archive/lecturers/filter-by-name';
    let preview       = '/lecturers/preview/';
    let previewArchive= '/archive/lecturers/preview/';

    let privateSessions   = '/programs/get-ajax-lecturer-sessions';

    let loadMoreLocked = false;

    let writeLecturers = function (lecturers){
        for(let i=0; i<lecturers.length; i++){
            $(".lecturers__list").append(function (){
                return $("<div>").attr('class', 'lecturers__list-item').attr('itemid', lecturers[i]['id']).attr('uri', (($("#archive").val() === "true") ? previewArchive : preview) + lecturers[i]['id'])
                    .append(function (){
                        return $("<img>").attr('src', '/files/images/public-part/users/' + lecturers[i]['photo_uri'])
                            .attr('class', 'lecturers__list-item-image');
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'lecturers__list-item-category').text(lecturers[i]['presenter_role'])
                    })
                    .append(function (){
                        return $("<a>").attr('href', (($("#archive").val() === "true") ? previewArchive : preview) + lecturers[i]['id'])
                            .append(function (){
                                return $("<h3>").attr('class', 'lecturers__list-item-name')
                                    .text(lecturers[i]['name']);
                            });
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'lecturers__list-item-subtitle').text(lecturers[i]['institution'])
                    })
                    .append(function (){
                        return $("<p>").attr('class', 'lecturers__list-item-description').text(lecturers[i]['short_description'])
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'lecturers__list-item-social-icons')
                            .append(function (){
                                if(lecturers[i]['linkedin'] !== null){
                                    console.log(lecturers[i]['linkedin']);
                                    return $("<a>").attr('href', lecturers[i]['linkedin']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                        .append(function (){
                                            return $("<img>").attr('src', '/files/images/svg-icons/linkedin.svg');
                                        })
                                }
                            })
                            .append(function (){
                                if(lecturers[i]['twitter'] !== null){
                                    return $("<a>").attr('href', lecturers[i]['twitter']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                        .append(function (){
                                            return $("<img>").attr('src', '/files/images/svg-icons/x.svg');
                                        })
                                }
                            })
                            .append(function (){
                                if(lecturers[i]['web'] !== null){
                                    return $("<a>").attr('href', lecturers[i]['web']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                        .append(function (){
                                            return $("<img>").attr('src', '/files/images/svg-icons/dribble.svg');
                                        })
                                }
                            });
                    });

            });
        }
    };

    $(".lecturers__more-button").click(function (){
        let lastID = 0;
        $(".lecturers__list-item").each(function (){
            lastID = $(this).attr('itemid');
        });

        if(loadMoreLocked) return;

        $.ajax({
            url: ($("#archive").val() === "true") ? loadMoreArchiveUri : loadMoreUri,
            method: 'POST',
            dataType: "json",
            data: {
                lastID: lastID,
                program_id : $("#program_id").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let lecturers = response['data']['lecturers'];


                    console.log(lecturers);

                    /* Remove load more btn and return */
                    if(lecturers.length === 0){
                        $(".lecturers__more-button").addClass('d-none');
                        return;
                    }


                    /* Write lecturers */
                    writeLecturers(lecturers);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
    $(".lecturers__search-input").on( "keyup", function() {
        let value = $(this).val();

        /* If empty, then allow load more */
        loadMoreLocked = value !== '';

        $.ajax({
            url: ($("#archive").val() === "true") ? filterByNameArchive : filterByName,
            method: 'POST',
            dataType: "json",
            data: {
                value: value,
                program_id : $("#program_id").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let lecturers = response['data']['lecturers'];
                    console.log(lecturers);

                    $(".lecturers__list").empty();

                    /* Write lecturers */
                    writeLecturers(lecturers);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    $("body").on('click', '.lecturers__list-item', function (){
        window.location.href = $(this).attr('uri');
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /* Fetch lecturer sessions */

    $("body").on('click', '.program__timeline-top-right__click', function (){
        let date = $(this).attr('date');
        let lecturer = $(this).attr('lecturer-id');
        let $this = $(this);

        let wrapper = $(".program__timeline-items");
        $.ajax({
            url: privateSessions,
            method: 'POST',
            dataType: "json",
            data: {
                date: date,
                lecturer: lecturer
            },
            success: function success(response) {
                if(response['code'] === '0000'){
                    let sessions = response['data']['sessions'];
                    let auth = response['data']['auth'];

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
                                                    return $("<div>").attr('class', 'program__timeline-item-left-duration').text(sessions[i]['duration'] + " min")
                                                })
                                        })
                                })
                                .append(function (){
                                    return $("<div>").attr('class', 'program__timeline-item-right')
                                        .append(function (){
                                            if(auth){
                                                return $("<a>").attr('href', "/programs/preview-session/" + sessions[i]['id'])
                                                    .append(function (){
                                                        return $("<h2>").attr('class', 'program__timeline-item-right-title').text(sessions[i]['title']);
                                                    })
                                            }else{
                                                return $("<a>")
                                                    .append(function (){
                                                        return $("<h2>").attr('class', 'program__timeline-item-right-title').text(sessions[i]['title']);
                                                    })
                                            }
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
