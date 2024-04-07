$(document).ready(function (){
    /* Format is: month / day / year */
    let td = new Date("06/10/2024");

    function TimeCalculator(seconds) {
        let y = Math.floor(seconds / 31536000);
        let mo = Math.floor((seconds % 31536000) / 2628000);
        let d = Math.floor(((seconds % 31536000) % 2628000) / 86400);
        let h = Math.floor((seconds % (3600 * 24)) / 3600);
        let m = Math.floor((seconds % 3600) / 60);
        let s = Math.floor(seconds % 60);

        /* Check if it's right page */
        // noinspection JSJQueryEfficiency
        if($(".c__month").length){
            $(".c__month").text(mo);
            $(".c__day").text(d);
            $(".c__hour").text(h);
            $(".c__min").text(m);
        }

        console.log(`${mo} Months ${d} Days ${h}:${m}:${s}`);
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
