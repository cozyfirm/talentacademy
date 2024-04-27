import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";

/* Deprecated */

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let fetchSessionsUri   = '/programs/fetch-sessions-data';

    $("body").on('click', '.program-session-page', function (){
        let $this = $(this);
        let grid = $(".programs__grid_iw");

        $.ajax({
            url: fetchSessionsUri,
            method: 'POST',
            dataType: "json",
            data: {
                program: $this.attr('program'),
                page: $this.attr('page')
            },
            success: function success(response) {
                if(response['code'] === '0000'){
                    let data = response['data']['data'];

                    grid.empty();

                    for(let i=0; i<data.length; i++){
                        grid.append(function (){
                           return $("<div>").attr('class', 'pg__sample pg__sample' + $this.attr('program'))
                               .append(function (){
                                   return $("<h1>").text(data[i]['title']);
                               })
                               .append(function (){
                                   return $("<div>").attr('class', 'pg_sample__row')
                                       // .html("<svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z\"/></svg> <h5> " + data[i]['title'] +" </h5>");
                                       .append(function (){
                                           return $("<svg>").attr('width', 27).attr('height', 24).attr('viewBox', '0 0 27 24').attr('fill', 'none')
                                               .append(function (){
                                                   return $("<path>").attr('d', 'M14 19V24H0V19C0 17.346 1.346 16 3 16H11C12.654 16 14 17.346 14 19ZM7 14C9.206 14 11 12.206 11 10C11 7.794 9.206 6 7 6C4.794 6 3 7.794 3 10C3 12.206 4.794 14 7 14ZM24 3V18H15.899C15.463 15.861 13.65 14.237 11.433 14.044C12.407 12.977 13 11.558 13 10C13 6.686 10.314 4 7 4C6.299 4 5.626 4.121 5 4.342V3C5 1.346 6.346 0 8 0H21C22.654 0 24 1.346 24 3ZM22 14H17V16H22V14Z')
                                               })
                                       });
                               })
                        });

                        console.log(data[i]);
                    }

                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
});
