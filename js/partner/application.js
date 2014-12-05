!function ($) {

    $(function(){
        var $window = $(window)
        $('.row-sticky').affix({
            offset: {
                top: $('header').height() + $('nav').height() + $('.row-introtext').height()
            }
        });
    })

    $(document).bind('ready', function() {

        //$(window).scroll(function() {
        //    console.log('scrolled');
        //});

        $(window).scroll(function() {
            if($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();    
            } else {
                $('#toTop').fadeOut();
            }
        });

        $('#toTop').click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
    });

}(window.jQuery)