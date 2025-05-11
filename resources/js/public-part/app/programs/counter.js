$(document).ready(function (){
    /* Format is: month / day / year */
    let td = new Date("06/01/2025 06:00:00").getTime();
    // let td = new Date("04/06/2024");

    function TimeCalculator(seconds) {
        let y = 0, mo = 0, d = 0, h = 0, m = 0, s = 0;

        if(seconds > 0){
            y = Math.floor(seconds / 31536000);
            mo = Math.floor((seconds % 31536000) / 2628000);
            d = Math.floor(((seconds % 31536000) % 2628000) / 86400);
            h = Math.floor((seconds % (3600 * 24)) / 3600);
            m = Math.floor((seconds % 3600) / 60);
            s = Math.floor(seconds % 60);
        }

        console.log(mo);
        /* Check if it's right page */
        if($(".c__month").length){
            if(mo){
                $(".c__month").text(mo).attr('title', 'Mjeseci');
                $(".c__day").text(d).attr('title', 'Dana');
                $(".c__hour").text(h).attr('title', 'Sati');
                $(".c__min").text(m).attr('title', 'Minuta');
            }else{
                $(".c__month").text(d).attr('title', 'Dana');
                $(".c__day").text(h).attr('title', 'Sati');
                $(".c__hour").text(m).attr('title', 'Minuta');
                $(".c__min").text(s).attr('title', 'Sekundi');
            }
        }

        // console.log(`${mo} Months ${d} Days ${h}:${m}:${s}`);
    }
    function countDown(){
        setTimeout(function(now){
            /* Calculate time difference */
            TimeCalculator((td - now) / 1000);

            countDown();
        }, 1000, Date.now());
    }

    /* Initialise data */
    TimeCalculator((td - Date.now()) / 1000);

    /* Start counting */
    countDown();
});
