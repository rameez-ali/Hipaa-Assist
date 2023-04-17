new WOW().init();

(function() {
    $(document).click(function() {
        var $item = $(".shopping-cart");
        if ($item.hasClass("active")) {
            $item.removeClass("active");
        }
    });

    $('#datepicker').datepicker();
    $('#datepicker-1').datepicker();
    $('#datepicker-2').datepicker();
    $('#datepicker-3').datepicker();


    $('#cart').click(function(e) {
        e.stopPropagation();
        $(".shopping-cart").toggleClass("active");
    });

    $('#addtocart').click(function(e) {
        e.stopPropagation();
        $(".shopping-cart").toggleClass("active");
    });

    let parents = document.getElementsByClassName("has_child");
    for (let i = 0; i < parents.length; i++) {
        parents[i].addEventListener("mouseenter", () => {
            parents[i].children[1].classList.add('mega-show')
        });

        parents[i].addEventListener("mouseleave", () => {
            parents[i].children[1].classList.remove('mega-show')

        });
    }

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });
    $("#sidebar2").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    $('#sidebarCollapse2').on('click', function () {
        $('#sidebar2').toggleClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

})();


// modal hide one modal show next one 
$("#pwd1-btn").click(function() {
    $('#pwdrecovery1').modal('hide');
    $('#pwdrecovery2').modal('show');
});

// modal hide one modal show next one 
$("#pwd2-btn").click(function() {
    $('#pwdrecovery2').modal('hide');
    $('#pwdrecovery3').modal('show');
});

// show password on eye icon click
$( ".confirm-icon" ).click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".confirm-input");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
  
// show password on eye icon click
$( ".enter-icon" ).click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".enter-input");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
  
// show password on eye icon click
$( ".current-icon" ).click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".current-input");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function() {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({
        opacity: 0
    }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({
                'left': left,
                'opacity': opacity
            });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function() {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({
        opacity: 0
    }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'left': left
            });
            previous_fs.css({
                'transform': 'scale(' + scale + ')',
                'opacity': opacity
            });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function() {
    return false;
});

$("#demo_1").ionRangeSlider({
    grid: false,
    type: "double",
    min: 0,
    max: 1000,
    from: 10,
    prefix: "$",
});

$('.banner-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    // autoplay:true,
    infinite: true,
    dots:true
});


$('.testimonial-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots:true,
    autoplay:false,
    infinite: true,
    prevArrow: "<div class='slick-prev-has slick-arrow'><img src='./images/left-arrow.png'></div>",
    nextArrow: "<div class='slick-next-has slick-arrow'><img src='./images/right-arrow.png'></div>",
    responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
            autoplay:true
          }
        },
      ]
});

  function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value == 1 ? "" : value--;
    // value--;
    document.getElementById('number').value = value;
  }

  $('#shipAd').change(function(){
    if(this.checked)
        $('.shipping-address-div').fadeIn('slow');
    else
        $('.shipping-address-div').fadeOut('slow');

  });

  $('.first').owlCarousel({
    loop:true,
    margin:10,
    nav: true,
    navText: ["<img src='./images/arrow-left.png'>","<img src='./images/arrow-right.png'>"],
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('.second').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<img src='./images/arrow-l.png'>","<img src='./images/arrow-r.png'>"],
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
$(document).ready(function () {

    setTimeout(function () {
        $('.preloader').fadeOut(100);
    }, 1000);

});
function getFile() {
    document.getElementById("upfile").click();
}
//   $breadcrumb-divider: quote(">");
