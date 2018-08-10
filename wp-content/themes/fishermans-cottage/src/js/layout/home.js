fc.home = fc.home || {};

fc.home.init = function() {
  
  function showSocial() {
    var distance = "48px";
    if (isTablet()) {
      distance = "38px";
    }
    
    $('.social-icon.twitter').css({"right" : distance});
    
    setTimeout(function() {
      $('.social-icon.facebook').css({"right" : distance});
    }, 200);
    
    setTimeout(function() {
      $('.social-icon.instagram').css({"right" : distance});
    }, 400);
  }
  
  function initMenu() {
    $foodMenuHeader = $('.home-menu .food');
    $drinkMenuHeader = $('.home-menu .drink');
    
    $foodMenu = $('#food-menu');
    $drinkMenu = $('#drink-menu');
    
    $drinkMenu.hide();
    
    $foodMenuHeader.on('click', function() {
      $drinkMenuHeader.removeClass('active');
      $foodMenuHeader.addClass('active');
      
      $foodMenu.show();
      $drinkMenu.hide();
    });
    
    $drinkMenuHeader.on('click', function() {
      $drinkMenuHeader.addClass('active');
      $foodMenuHeader.removeClass('active');
      
      $foodMenu.hide();
      $drinkMenu.show();
    });
  }
  
  function setupSmoothScroll() {
    $('a[href*="#"]')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      if ( location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) {
              return false;
            } else {
              $target.attr('tabindex','-1');
              $target.focus();
            };
          });
        }
      }
    });
  }
  
  function initContactForm() {
    $('#contact-form').on("submit", function(e) {
      e.preventDefault();
      
      console.log($(this).serialize());
      
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: post_url,
        data: $(this).serialize(),
        success: function (results) {
          console.log(results);
          $(".form-container").text(results.successMessage);
          $("#contact-form").hide();
        },
        error: function (error) {
          console.log(error);
        }
      });
      return false;
    });
  }
  
  if($('.rtb-message').length > 0) {
    $('.booking-info').hide();
    $('html, body').animate({
      scrollTop: 0
    }, 50);
    setTimeout(function() {
      $('html, body').animate({
        scrollTop: $("#booking").offset().top
      }, 1000);
    }, 50);
    
  } else {
    console.log($('.rtb-message'));
  }
  
  initContactForm();
  showSocial();
  initMenu();
  setupSmoothScroll();
}
