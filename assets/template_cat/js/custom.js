/**
 * Created by Furkan on 18.9.2015.
 */

$(function(){
    var menuType = 'desktop';

    $(window).scroll(function() {
        if ( $(this).scrollTop() > 800 ) {
            $('.go-top').addClass('show');
        } else {
            $('.go-top').removeClass('show');
        }
    });

    $('.go-top').on('click', function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });

    if($(window).width()>=768)
    {
        $('.slider').css({"height":$(window).height()-($('#header').height())+"px"});
    }else
    {
        $('.slider').css({"height":"auto"});
    }

    $(window).on('resize', function() {

        if($(window).width()>=768)
        {
            $('.slider').css({"height":$(window).height()-($('#header').height())+"px"});
        }else
        {
            $('.slider').css({"height":"auto"});
        }


        var currMenuType = 'desktop';

        if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
            currMenuType = 'mobile';
        }

        if ( currMenuType !== menuType ) {
            menuType = currMenuType;

            if ( currMenuType === 'mobile' ) {
                var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

                $('#header').find('.header-wrap').after($mobileMenu);
                hasChildMenu.children('ul').hide();
                hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                $('.btn-menu').removeClass('active');
            } else {
                var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                $desktopMenu.find('.submenu').removeAttr('style');
                $('#header').find('.col-md-9').append($desktopMenu);
                $('.btn-submenu').remove();
            }
        }
    });

    $('.btn-menu').on('click', function() {
        $('#mainnav-mobi').slideToggle(300);
        $(this).toggleClass('active');
    });

    $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
        $(this).toggleClass('active').next('ul').slideToggle(300);
        e.stopImmediatePropagation()
    });

});
