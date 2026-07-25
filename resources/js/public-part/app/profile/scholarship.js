$(document).ready(function () {
    let programs = $(".single__program_wrapper");
    let currentIndex = 0;
    let currentID = 3;

    let changeColor = function () {
        let wrapper = $(".programs__wrapper_colored");

        for (let i = 1; i <= 5; i++) {
            wrapper.removeClass(
                "programs__wrapper_colored_" + i
            );
        }

        wrapper.addClass(
            "programs__wrapper_colored_" + currentID
        );
    };

    let showCurrentProgram = function () {
        let currentProgram = programs.eq(currentIndex);

        programs.css("display", "none");

        currentProgram.css(
            "display",
            "inline-flex"
        );

        /*
         * Iz klase trenutnog diva uzima broj:
         * single__program_wrapper-3 → 3
         * single__program_wrapper-5 → 5
         * single__program_wrapper-2 → 2
         */
        let classes = currentProgram.attr("class");
        let result = classes.match(
            /single__program_wrapper-(\d+)/
        );

        if (result) {
            currentID = parseInt(result[1], 10);
        }

        changeColor();
    };

    $(".apply-for-scholarship-next").click(function () {
        currentIndex++;

        if (currentIndex >= programs.length) {
            currentIndex = 0;
        }

        showCurrentProgram();
    });

    $(".apply-for-scholarship-previous").click(function () {
        currentIndex--;

        if (currentIndex < 0) {
            currentIndex = programs.length - 1;
        }

        showCurrentProgram();
    });

    showCurrentProgram();
});
