(function($){
    function loaded(){
        $('.slick').addClass('active');
        $('.slick-scrollHP').addClass('active');
        $('.slick-gallery').addClass('active');

        $('.slick').slick({
            slidesToShow: 2,
            arrows: true,
            pauseOnHover: false,
            dot: false
        });
        $('scrollHP').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 6000,
            pauseOnHover: false,
            speed: 600,
        });

        $('.slick-gallery').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 6000,
            pauseOnHover: false,
            speed: 600,
        });
    }
    function slick_scroll(){
        var h = parseInt($(window).height(), 0),
        w = parseInt($(window).width(), 0),
        sp = parseInt($(window).scrollTop(), 0),
        np = 1-(sp/h);

        $('.touch-slider .slick-item').each(function(){
            var self = $(this);
            var el = $(self).offset();
            var elt = sp - (el.top-h);
            
            if(elt > 0){
                var j = 100 - (elt/h*100);
                $(self).css('background-position', 'center '+j+'%');
            }
        });
        $('.slick-gallery .slick-item').each(function(){
            var self = $(this);
            var el = $(self).offset();
            var elt = sp - (el.top-h);
            
            if(elt > 0){
                var j = 150 - (elt/h*100);
                $(self).css('background-position', 'center '+j+'%');
            }

        });
    }
    $(window).scroll( function(e){
      slick_scroll();
    });
    $(window).load( function(e){
        loaded();
      slick_scroll();
      $('.slick-gallery').addClass('on');
    });
    $('.trigger-modal').click(function (e) {
        $("#modal").modal();
        $("iframe#ytplayer").attr("src", $("iframe#ytplayer").attr("src").replace("autoplay=0", "autoplay=1"));
        return false;
    });

        




    function scrollAll(){
        var sp = parseInt($(window).scrollTop(), 0);
        var w = $(window).width();
        if(w > 768){
            if(sp > 0){
                $('body').addClass('scrolled');

            }else{
                $('body').removeClass('scrolled');

            }
        }
    }



    function scrolling(){
        if ( $( "#Timeline" ).length ) {
            var h = parseInt($(window).height(), 0),
            sp = parseInt($(window).scrollTop(), 0);

            $('#Timeline .item').each(function(i){
                var self = $(this);
                var el = $(self).offset();
                var elt = sp - (el.top-h);
                if(elt > 0){
                    var j = 100 - (elt/h*100);
                    if(j < 50){
                        $(self).addClass('animate');
                        //console.log("item: "+i+" num: "+j);
                    }else if(j > 50){
                        $(this).removeClass('animate');
                    }                
                }
            });
            var tl = $('#Timeline').offset();
            var tlh = tl.top + $('#Timeline').height();
            if(sp > tlh){
                 $('#Timeline').addClass('removescroll');
            }else{
                $('#Timeline').removeClass('removescroll');
            }
        }
    }




    $(window).scroll( function(e){
        scrollAll();
        scrolling();
    });
    $(window).resize( function(e){
        scrollAll();
    });
    $(window).load( function(e){
        scrollAll();
        scrolling();
        $('#HomeSlider').fadeIn();
        
    });
            

    $('a[href*=#]:not([href=#])').click(function() {
        console.log('this.hash.slice(1)');
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            $('.submenu li').removeClass('current_page_item');
            $(this).parent().addClass('current_page_item');
            var target = $(this.hash);
            var topoffset = 1000;
            target = target.length ? target : $('[id=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - topoffset
                }, 800 );
                return false;
            }
        }
    });

})(jQuery);
