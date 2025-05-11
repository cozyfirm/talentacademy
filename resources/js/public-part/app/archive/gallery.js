import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";
import {post} from "axios";

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadMoreUri = '/archive/photo-gallery/load-more';
    let previewUri  = '/archive/photo-gallery/fetch-image';

    $(".load__more_gallery_btn").click(function (){
        let lastID = 0;
        $(".img__gallery__wrapper").each(function (){
            lastID = $(this).attr('attr-id');
        });

        $.ajax({
            url: loadMoreUri,
            method: 'POST',
            dataType: "json",
            data: {
                lastID: lastID
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let images = response['data']['images'];
                    let isLast = response['data']['isLast'];

                    if(isLast === true){
                        $(".gallery__load_more_w").addClass('d-none');
                    }

                    for(let i=0; i<images.length; i++){

                        $(".photo-gallery-wrapper").append(function (){
                            return $("<div>").attr('class', 'img__gallery__wrapper').attr('attr-id', images[i]['id']).attr('title', 'Pregledajte fotografiju')
                                .append(function (){
                                    return $("<img>").attr('src', '/' + images[i]['path'] + '/' + images[i]['name'])
                                })
                                .append(function (){
                                    return $("<div>").attr('class', 'gallery_shadow')
                                        .append(function (){
                                            return $("<div>").attr('class', 'open_icon_w')
                                                .append(function (){
                                                    return $("<i>").attr('class', 'fas fa-expand')
                                                })
                                        })
                                })
                        })
                    }
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });


    /**
     *  Fetch images
     */

    $("body").on('click', '.img__gallery__wrapper, .archive_gallery__navigation-button', function (){
        let attrID = $(this).attr('attr-id');

        $.ajax({
            url: previewUri,
            method: 'POST',
            dataType: "json",
            data: {
                attrID: attrID,
            },
            success: function success(response) {
                let data = response['data'];

                if(response['code'] === '0000'){
                    $(".image__wrapper").removeClass('d-none');

                    $("#gallery_main_img").attr('src', '/' + data['image']['path'] + '/' + data['image']['name']);

                    if(data['next'] !== ''){
                        $(".gallery__navigation_next").removeClass('d-none').attr('attr-id', data['next']['id']);
                    }else{
                        $(".gallery__navigation_next").addClass('d-none');
                    }
                    if(data['previous'] !== ''){
                        $(".gallery__navigation_previous").removeClass('d-none').attr('attr-id', data['previous']['id']);
                    }else{
                        $(".gallery__navigation_previous").addClass('d-none');
                    }
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

    $(".img__gallery__wrapper, .gallery__navigation-button").click(function (){

    })

    $(".close_gallery").click(function (){
        $(".image__wrapper").addClass('d-none');
    });
});
