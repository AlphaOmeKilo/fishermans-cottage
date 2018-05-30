fc.event = fc.event || {};

fc.event.init = function() {
  
  $('.event-link').on('click tap', function(e) {
    e.preventDefault();
    
    $(this).siblings('.event-overlay-foreground').add('.event-overlay-background').addClass('active').addClass('visible');
  });
  
  $('.close-event').on('mouseenter', function() {
    $('.line').addClass('active'); 
  }).on('mouseleave', function() {
    $('.line').removeClass('active');
  }).on('click tap', function() {
    $('.event-overlay-foreground').add('.event-overlay-background').removeClass('active');
    setTimeout(function() {
      $('.event-overlay-foreground').add('.event-overlay-background').removeClass('visible');
    }, 1000);
    
  });
  
}