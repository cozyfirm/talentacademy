$(document).ready(function (){
    let headerSubmenu = $(".header__submenu");

    $(".show-header-submenu").click(function (){
        headerSubmenu.toggleClass('header__submenu_visible');

        if(headerSubmenu.hasClass('header__submenu_visible')) $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        else $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up');
    });
});
