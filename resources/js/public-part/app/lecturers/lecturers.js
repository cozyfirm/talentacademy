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
    let filterByName = '/lecturers/filter-by-name';

    let loadMoreLocked = false;

    let writeLecturers = function (lecturers){
        for(let i=0; i<lecturers.length; i++){
            $(".lecturers__list").append(function (){
                return $("<div>").attr('class', 'lecturers__list-item').attr('itemid', lecturers[i]['id'])
                    .append(function (){
                        return $("<img>").attr('src', '/files/images/public-part/users/' + lecturers[i]['photo_uri'])
                            .attr('class', 'lecturers__list-item-image');
                    })
                    .append(function (){
                        return $("<div>").attr('class', 'lecturers__list-item-category').text(lecturers[i]['presenter_role'])
                    })
                    .append(function (){
                        return $("<a>").attr('href', '#')
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
                                return $("<a>").attr('href', lecturers[i]['linkedin']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                    .append(function (){
                                        return $("<img>").attr('src', '/files/images/svg-icons/linkedin.svg');
                                    })
                            })
                            .append(function (){
                                return $("<a>").attr('href', lecturers[i]['twitter']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                    .append(function (){
                                        return $("<img>").attr('src', '/files/images/svg-icons/x.svg');
                                    })
                            })
                            .append(function (){
                                return $("<a>").attr('href', lecturers[i]['web']).attr('target', '_blank').attr('class', 'lecturers__list-item-social-icon')
                                    .append(function (){
                                        return $("<img>").attr('src', '/files/images/svg-icons/dribble.svg');
                                    })
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
            url: loadMoreUri,
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
            url: filterByName,
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
});
