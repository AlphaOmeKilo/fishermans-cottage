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
  
  showSocial();
}
