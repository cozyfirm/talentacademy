$(document).ready(function (){
    setInterval(function () {
        $.ajax({
            url: '/dashboard/update-online-status',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Laravel CSRF token
            },
            success: function () {
                console.log('Ping sent to update last_online');
            },
            error: function () {
                console.warn('Ping failed');
            }
        });
    }, 30000); // 30 sekundi
});
