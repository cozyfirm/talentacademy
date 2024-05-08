$(document).ready(function() {
    $('.summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['help']]
        ],
        placeholder: 'Unesite vaš tekst ovdje ..',
        height : 300
    });

    if ( $('.summernote').is('[readonly]') ) {
        $('.summernote').summernote('disable');
    }

});
