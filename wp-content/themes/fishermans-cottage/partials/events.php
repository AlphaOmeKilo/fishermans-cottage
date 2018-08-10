<div class="events-list">
  
  <?php
  
    $event_count = 0;
  
    $current_event_month = 13;
  
    $args = array(
      'post_type'   => 'event',
      'order' => 'ASC',
    );

    $temp = $wp_query; $wp_query= null;
    $wp_query = new WP_Query($args);
    while ($wp_query->have_posts()) : $wp_query->the_post(); 
  ?>
  
  <?php 
  $months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  $event_date = get_field('event_date');
  
  $d = date_parse_from_format("Y-m-d", $event_date);
  $event_year = $d["year"];
  $event_month = $d["month"];
  $event_day = $d["day"];
  $current_month = date('m');
  $current_year = date('Y');
  
  if ($event_day < 10): 
    $event_day = "0".$event_day;
  endif;
  ?>
  
  <?php if($current_year <= $event_year && $current_month <= $event_month): 
        $event_count++;
  ?>
  
  
    <?php if($event_month != $current_event_month) : ?>
      <?php if($current_event_month != 13): ?>
        </div>
      <?php endif; ?>

      <div class="event-month clearfix">
        <h2 class="h2 month-header"><?php echo $months[$event_month]; ?></h2>
    <?php endif; ?>

        <a href="" class="event-link"><div class="col-lg-4 col-md-4 col-sm-12 event">
          <img class="event-poster" src="<?php echo the_field('event_poster'); ?>">
          <div class="date-wedge"></div>
          <div class="date-container"><?php echo $event_day; ?></div>
        </div></a>

        <div class="event-overlay-background"></div>

        <div class="event-overlay-foreground">
          <div class="scrollable-content">
            <h2 class="h2 event-title"><?php echo the_title(); ?></h2>
            <img class="event-poster col-sm-6" src="<?php echo the_field('event_poster'); ?>">
            <p class="b2 event-details col-sm-6"><?php echo the_field('details'); ?></p>
            <div class="close-event"><div class="line line-1"></div><div class="line line-2"></div></div>
          </div>
        </div>

  <?php 
    $current_event_month = $event_month;
    endif;
    endwhile; 
    wp_reset_query(); 
        
    if($event_count == 0):
  ?>
    
      <p class="b1 text-center">There are no events currently scheduled.<br/><br/>Check back soon!</p>
        
  <?php endif; ?>
  </div>
</div>