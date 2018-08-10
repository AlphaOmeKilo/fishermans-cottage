fc.filter = fc.filter || {};

fc.filter.init = function() {
  
  $('#food-menu .filter-option').on('click tap', function() {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      updateMenuFilter();
    } else {
      $(this).addClass('active');
      updateMenuFilter();
    }
  });
  
   updateMenuFilter = function() {
    var $selectedFilters = $('#food-menu .filter-option.active');
     
    var $filters = [];
    $selectedFilters.each(function(index) { 
      $filters.push($(this).data('filter'))
    });
     
     console.log('filter');
     
    $.ajax({
        url  : ajax_url,
        type : "POST",
        data : { action: 'fc_filter_menu', filters: $filters},
        success: function(response) {
          console.log(response);
          var $response = $('<div />').html(response);
          var $searchResults = $response.find('.menu-section');
          $('.menu-section-container').html($searchResults);
          
        },
        error: function(err) {
          console.log(err);
        }
      });

      return false;
  }
}
