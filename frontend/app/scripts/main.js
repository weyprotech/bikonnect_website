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
  $(document).on(clickHandler, function(event) {
    if (!$(event.target).is('#sidebar, #sidebar *, #btn_menu, #btn_menu *')) {
      $('#sidebar').trigger('sidebar:close').removeClass('active');
      $('#btn_menu').removeClass('active');
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

  // Dropdown
  if ($('.dropdown').length > 0) {
    $('.dropdown').on(clickHandler, '.dropdown_head', function() {
      $(this).toggleClass('active').parent('.dropdown').toggleClass('active');
      $(this).next('.dropdown_list').stop().slideToggle();
    });
    $('.dropdown').on(clickHandler, '.dropdown_list a', function () {
      var txt = $(this).text();
      $(this).addClass('active').parents('.dropdown_list').stop().slideUp().find('a').not(this).removeClass('active');
      $(this).parents('.dropdown').removeClass('active').children('.dropdown_head').text(txt).removeClass('active');
    });
    $(document).on(clickHandler, function(event) {
      if (!$(event.target).is('.dropdown.active, .dropdown.active *')) {
        $('.dropdown.active').children('.dropdown_head').removeClass('active');
        $('.dropdown.active').children('.dropdown_list').stop().slideUp();
        $('.dropdown.active').removeClass('active');
      }
    });
  }

  // Slick Slider
  if ($('.index_banner_slider').length > 0) {
    var indexBanner = $('.index_banner_slider');
    var bannerSlider = indexBanner.find('.slider');
    var bannerDots = indexBanner.find('.slider_dots');

    bannerSlider.on('init', function (event, slick) {
      $(slick.$slider[0]).addClass('loaded');
    })
    bannerSlider.slick({
      fade: true,
      infinite: true,
      arrows: false,
      dots: true,
      speed: 800,
      autoplay: true,
      autoplaySpeed: 8000,
      appendDots: bannerDots
    }).on('setPosition', function (event, slick) {
      slick.$slides.css('height', 'auto');
      slick.$slides.css('height', slick.$slideTrack.height() + 'px');
    });
  }
  if ($('.strength_sliders .slider').length > 0) {
    $('.strength_sliders .slider').slick({
      infinite: true,
      speed: 800
    })
  }

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
      $('.captcha').css({ 'width': '', 'height': '' });
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
  var reCaptchaHeight = 78;
  var containerWidth = $('.captcha').width();

  if (reCaptchaWidth > containerWidth) {
    var captchaScale = containerWidth / reCaptchaWidth;
    $('.captcha_inner').css({
      'transform': 'scale(' + captchaScale + ')'
    });
    $('.captcha').css({
      'width': reCaptchaWidth * captchaScale + 'px',
      'height': reCaptchaHeight * captchaScale + 'px'
    });
  } else {
    $('.captcha_inner').css({
      'transform': ''
    });
    $('.captcha').css({
      'width': '',
      'height': ''
    });
  }
}
