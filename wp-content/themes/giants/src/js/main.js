
var GiantsSite = {
  // All pages
  page: {
    init: function() {
      // JS here
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
        }).on('click', function( e, slick, currentSlide ) {
            $('.slick-gallery').slick('slickPause');
        });
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
          slick_scroll();
          $('.slick-gallery').addClass('on');
        });
        $('.trigger-modal').click(function (e) {
            $("#modal").modal();
            $("iframe#ytplayer").attr("src", $("iframe#ytplayer").attr("src").replace("autoplay=0", "autoplay=1"));
            return false;
        });

    },
    finalize: function() { }
  },
  gallery: {

    init:function(){




    },
    finalize: function() { }
  },

    single: {
        init: function() {
        // JS here
            $('.slick').slick({
                slidesToShow: 2,
                arrows: true,
                pauseOnHover: false,
                dot: false
            });
            $('.slick-gallery').slick({
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                pauseOnHover: false,
                speed: 600,
            });
            $('.trigger-modal').click(function (e) {
                $("#modal").modal();
                $("iframe#ytplayer").attr("src", $("iframe#ytplayer").attr("src").replace("autoplay=0", "autoplay=1"));
                return false;
            });
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
                    var copy = self.data('slide');
                    var img = self.data('img');
                    var layout = self.data('layout');
                    self.find('.overlay-left').html(copy);
                    if(img != ''){
                        self.find('.overlay-right').html('<img src="'+img+'" />');
                    }

                });
            }
            $(window).scroll( function(e){
                slick_scroll();
            });
            $(window).load( function(e){
                slick_scroll();
                $('.slick-gallery').addClass('on');
            });
        },
        finalize: function() { }
    }
}



var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = GiantsSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);

(function(){
    function scrollAll(){
        var sp = parseInt($(window).scrollTop(), 0);
        var w = $(window).width();
        if(w > 768){
            if(sp > 45){
                $('#site-navigation').css({
                    position: 'fixed',
                    top: 0
                });
                $('.submenu-wrap').css({
                    marginTop: '44px'
                });
                $('.site-branding').css({
                    height: '40px'
                });
            }else{
                $('#site-navigation').css({
                    position: 'absolute',
                    top: 35
                }); 
                $('.submenu-wrap').css({
                    marginTop: '65px'
                });
                $('.site-branding').css({
                    height: '84px'
                });
            }
            if(sp > 0){
                $('.site-branding').css({
                    top: 5
                });
            }else{
                $('.site-branding').css({
                    top: 20
                });
            }
        }

    }



    function scrolling(){

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
        
    });

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            $('#submenu li').removeClass('current_page_item');
            $(this).parent().addClass('current_page_item');
            var target = $(this.hash);
            var topoffset = 100;
            console.log(this.hash.slice(1));
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





