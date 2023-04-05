//Active Class
$(document).ready(function(){
  $('.nav-item a').click(function(){
    $('.nav-item a').removeClass("active");
    $(this).addClass("active");
  });
});

//Home main slider Js
$('.home-slider-items-wrapper').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

//testimonial slider Js
$('.testimonial-items-wrap').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 2
        }
    }
});

// Counter Js
if ($(".counter-item-outer").length > 0) {
    $(window).scroll(testScroll);
    var viewed = false;

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function testScroll() {
        if (isScrolledIntoView($(".counter-item-outer")) && !viewed) {
            viewed = true;
            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    }
}


  // Navbar Toggle Button For Mini Device
$('.nav-toggle-btn').click(function(){
  $('.nav-items-wrapper').toggleClass('menu-visible');
  $('body').toggleClass('body-overflow');
});

// fixed header
$(window).scroll(function(){
  var scrollTop =$(window).scrollTop();
  if(scrollTop >=100){
    $('body').addClass('fixed-header');
  }else{
    $('body').removeClass('fixed-header');
  }
});