import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";
import {post} from "axios";

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadMoreUri = '/blog/load-more';
    let previewUri  = '/blog/preview/';

    $(".load__more_btn").click(function (){
        let lastID = 0;
        $(".blog__item").each(function (){
            lastID = $(this).attr('itemid');
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
                    let posts = response['data']['posts'];

                    /* Remove load more btn and return */
                    if(posts.length === 0){
                        $(".blog__load_more_w").addClass('d-none');
                        return;
                    }

                    for(let i=0; i<posts.length; i++){
                        $(".blog__items").append(function (){
                            return $("<div>").attr('class', 'blog__item').attr('itemid', posts[i]['id']).attr('uri', previewUri + posts[i]['id'])
                                .append(function (){
                                    return $("<img>").attr('src', posts[i]['img']).attr('class', 'blog__item-image')
                                        .attr('alt', 'Blog image');
                                })
                                .append(function (){
                                    return $("<div>").attr('class', 'blog__item-content')
                                        .append(function (){
                                            return $("<div>").attr('class', 'blog__item-content-box')
                                                .append(function (){
                                                    return $("<div>").attr('class', 'blog__item-content-box-category')
                                                        .text(posts[i]['categoryVal']);
                                                })
                                                .append(function (){
                                                    return $("<div>").attr('class', 'blog__item-content-box-read-time')
                                                        .text(posts[i]['createdAt']);
                                                });
                                        })
                                        .append(function (){
                                            return $("<div>").attr('class', 'blog__item-content-title')
                                                .text(posts[i]['title']);
                                        })
                                        .append(function (){
                                            return $("<div>").attr('class', 'blog__item-content-description')
                                                .text(posts[i]['short_desc']);
                                        });
                                });
                        })
                    }
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

});
