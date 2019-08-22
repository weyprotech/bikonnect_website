var windowWidth = $(window).width();
var clickHandler = ('ontouchstart' in document.documentElement ? 'touchstart' : 'click');

$(document).ready(function () {
  $('.retina').retina();

  // Sticky
  sticky();

  // Sidebar
  $('#sidebar').sidebar({
    side: 'left'
  });
  $('#btn_menu').on(clickHandler, function (event) {
    event.preventDefault();
    $(this).toggleClass('active');
    $('#sidebar').trigger('sidebar:toggle').toggleClass('active');
  });
  $('.sidebar_menu ul li a').on(clickHandler, function (event) {
    if ($(this).siblings('ul').length > 0) {
      $(this).toggleClass('active').siblings('ul').stop().slideToggle();
    }
  });

  //Nav
  $('.head_nav ul li').on('mouseenter', function (event) {
    $(this).children('a').addClass('active');
    if ($(this).children('ul').length > 0) {
      $(this).children('ul').stop().slideDown('250', function () {
        $(this).addClass('active');
      });
    }
  });
  $('.head_nav ul li').on('mouseleave', function (event) {
    $(this).children('a').removeClass('active');
    if ($(this).children('ul').length > 0) {
      $(this).children('ul').stop().slideUp('250', function () {
        $(this).removeClass('active');
      });
    }
  });

  // Captcha Size
  if ($('.captcha').length > 0) {
    scaleCaptcha();
  }

  // Header Search
  // $('#head_search').on(clickHandler, '.btn_scarch', function(event) {
  //   event.preventDefault();
  //   $('#head_search .head_search_form').addClass('active');
  // });
  // $(document).on(clickHandler, function(event) {
  //   if (!$(e.target).is('#head_search, #head_search *')) {
  //     $('#head_search .head_search_form').removeClass('active');
  //   }
  // });

  // Slick Slider
  // $('.news_slider').slick({
  //   infinite: true,
  //   speed: 300,
  //   autoplay: true,
  //   autoplaySpeed: 8000
  // });

  // Popup Close
  // $(document).on(clickHandler, '.popup-modal-dismiss', function (event) {
  //     event.preventDefault();
  //     $.magnificPopup.close();
  // });

  // Tab - jquery.tabber.js
  // $('.tabber_wrapper').tabber();

  // Fit Vidos - jquery.fitvids.js
  // $('#wrapper').fitVids();

  // Body Scroll
  // $(window).scroll(function () {
  //   $('[data-anchor]').each(function (index, el) {
  //     var scrolltop = $(window).scrollTop(),
  //       position = $(this).offset().top,
  //       headerH = $('#header').outerHeight(true),
  //       selfH = $(this).outerHeight(true),
  //       anchor = $(this).attr('data-anchor');

  //     if (scrolltop >= position - headerH - 5 && scrolltop <= position - headerH + selfH - 5) {
  //       $('#stickyNav ul a.active').removeClass('active');
  //       $('#stickyNav ul a[href="#' + anchor + '"]').addClass('active');
  //     } else {
  //       $('#stickyNav ul a[href="#' + anchor + '"]').removeClass('active');
  //     }
  //   });
  // });

  // Back to top
  if ($('#backTop').length > 0) {
    $('#backTop').on(clickHandler, function (event) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: 0
      }, 500, 'swing');
    });
    $(window).on('scroll', function () {
      if ($(window).scrollTop() > 100) {
        $('#backTop').stop().fadeIn(400, function () {
          $(this).css('display', 'block');
        });
      } else {
        $('#backTop').stop().fadeOut(400);
      }
    });
  }

  // Block Link
  $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .on(clickHandler, function (event) {
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
        location.hostname == this.hostname
      ) {
        var url = $(this).attr('href');
        var hashName = url.split('#')[1];
        var $target = $('[data-anchor="' + hashName + '"]');

        if ($target.length > 0) {
          $('html, body').stop().animate({
            scrollTop: $target.offset().top - $('#header').outerHeight()
          }, 800);
        }
      }
    });
});

// Resize
$(window).on('resize', function () {
  if (windowWidth != $(window).width()) {
    $('#header').unstick();
    sticky();

    if ($('.captcha').length > 0) {
      scaleCaptcha();
    }

    windowWidth = $(window).width();
  }
});

$(window).on('load', function () {
  // Link
  var url = window.location.toString();
  var hashName = url.split('#')[1];
  var $target = $('[data-anchor="' + hashName + '"]');

  if ($target.length > 0) {
    console.log
    // Reset where animation starts.
    $('html, body').scrollTop(0);
    // Animate to
    $('html, body').stop().animate({
      scrollTop: $target.offset().top - $('#header').outerHeight()
    }, 800);
  }
});

$(window).on('hashchange', function () {
  var hash = window.location.hash;
  var hashName = hash.split('#')[1];
  var $target = $('[data-anchor="' + hashName + '"]');

  if ($target.length > 0) {
    $('html, body').stop().animate({
      scrollTop: $target.offset().top - $('#header').outerHeight()
    }, 800);
  }
});

function sticky() {
  $('#header').sticky({
    topSpacing: 0,
    zIndex: 99
  });
}

//use width google reCaptcha
function scaleCaptcha() {
  var reCaptchaWidth = 304;
  var containerWidth = $('.captcha').width();

  if (reCaptchaWidth > containerWidth) {
    var captchaScale = containerWidth / reCaptchaWidth;
    $('.captcha_inner').css({
      'transform': 'scale(' + captchaScale + ')'
    });
  } else {
    $('.captcha_inner').css({
      'transform': ''
    });
  }
}
