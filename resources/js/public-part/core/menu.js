$(document).ready(function (){
    let headerSubmenu = $(".header__submenu");

    $(".show-header-submenu").click(function (){
        headerSubmenu.toggleClass('header__submenu_visible');

        if(headerSubmenu.hasClass('header__submenu_visible')) $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        else $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up');
    });

    $('#open-mobile-menu').click(function(){
        $('.mobile-menu').addClass('mobile-menu--visible');
    });

    $('#close-mobile-menu').click(function(){
        $('.mobile-menu').removeClass('mobile-menu--visible');
    });

    $('#open-mobile-submenu').click(function() {
        $('.mobile-menu__submenu').slideToggle();
        $('#open-mobile-submenu i').toggleClass('rotate');
    });

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Profile submenu
     */
    let innerMenuOpen = false;
    if(window.innerWidth <= 1200){
        $(".profile__submenu").addClass('active');
        // $(".profile__inner_menu").toggleClass('d-none');
    }
    $(".profile__submenu").click(function (){
        if(!innerMenuOpen){
            innerMenuOpen = true;

            $(".profile__inner_menu").css('display', 'inline-flex');
        }else{
            innerMenuOpen = false;
            $(".profile__inner_menu").css('display', 'none');
        }
    });
});
