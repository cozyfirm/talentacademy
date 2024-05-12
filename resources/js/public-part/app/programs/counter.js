$(document).ready(function (){
    /* Format is: month / day / year */
    let td = new Date("06/06/2024");
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

        /* Check if it's right page */
        // noinspection JSJQueryEfficiency
        if($(".c__month").length){
            $(".c__month").text(d);
            $(".c__day").text(h);
            $(".c__hour").text(m);
            $(".c__min").text(s);
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
