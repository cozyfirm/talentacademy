import { Notify } from './../../../style/layout/notify.ts';
import { Validator } from "../../../style/layout/validator.ts";

$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let contactUsUri = '/contact-us/send-us-a-message';

    $(".contact__form").submit(function (e){
        e.preventDefault();

        let name    = $("#contact__form-name").val();
        let surname = $("#contact__form-surname").val();
        let email   = $("#contact__form-email").val();
        let program = $("#contact__form-program").val();
        let message = $("#contact__form-message").val();

        if(name === '' || surname === '' || program === '' || message === ''){
            Notify.Me(["Molimo popunite sva polja!!", "warn"]);
            return;
        }
        if(!Validator.email(email)){
            Notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        $.ajax({
            url: contactUsUri,
            method: 'POST',
            dataType: "json",
            data: {
                name: name,
                surname: surname,
                email: email,
                program: program,
                message: message
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    $("#contact__form-name").val("")
                    $("#contact__form-surname").val("")
                    $("#contact__form-email").val("")
                    $("#contact__form-message").val("")

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });

});
