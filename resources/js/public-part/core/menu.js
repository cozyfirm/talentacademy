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
});
