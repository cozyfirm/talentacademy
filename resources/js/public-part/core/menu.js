$(document).ready(function () {

    $(".show-header-submenu").click(function () {
        const submenuName = $(this).attr('submenu');
        const submenu = $('#' + submenuName + '-submenu');

        // Da li je submenu koji smo kliknuli trenutno otvoren
        const isOpen = submenu.hasClass('header__submenu_visible');

        // Zatvori sve submenu-e
        $('.header__submenu').removeClass('header__submenu_visible');

        // Vrati sve ikonice na chevron-down
        $('.show-header-submenu i')
            .removeClass('fa-chevron-up')
            .addClass('fa-chevron-down');

        // Ako prethodno nije bio otvoren, otvori njega
        if (!isOpen) {
            submenu.addClass('header__submenu_visible');

            $(this).find('i')
                .removeClass('fa-chevron-down')
                .addClass('fa-chevron-up');
        }
    });


    $('#open-mobile-menu').click(function () {
        $('.mobile-menu').addClass('mobile-menu--visible');
    });

    $('#close-mobile-menu').click(function () {
        $('.mobile-menu').removeClass('mobile-menu--visible');
    });

    $('.open-mobile-submenu').click(function() {
        const submenuName = $(this).data('submenu');
        const submenu = $('#mobile-' + submenuName + '-submenu');

        const isOpen = submenu.is(':visible');

        // Zatvori sve ostale
        $('.mobile-menu__submenu').not(submenu).slideUp();

        // Vrati ikonice ostalih
        $('.open-mobile-submenu').not(this)
            .find('i')
            .removeClass('rotate');

        // Otvori/zatvori kliknuti
        submenu.slideToggle();

        // Rotiraj njegovu ikonicu
        $(this).find('i').toggleClass('rotate', !isOpen);
    });


    /*
     * Profile submenu
     */
    let innerMenuOpen = false;

    if (window.innerWidth <= 1200) {
        $(".profile__submenu").addClass('active');
    }

    $(".profile__submenu").click(function () {
        if (!innerMenuOpen) {
            innerMenuOpen = true;
            $(".profile__inner_menu").css('display', 'inline-flex');
        } else {
            innerMenuOpen = false;
            $(".profile__inner_menu").css('display', 'none');
        }
    });
});
