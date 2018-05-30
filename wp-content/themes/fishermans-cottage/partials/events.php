<div class="events-list">
  
  <?php
  
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
  $event_month = $d["month"];
  $current_month = date('m');
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
      </div></a>
      
      <div class="event-overlay-background"></div>

      <div class="event-overlay-foreground">
        <h2 class="h2 event-title"><?php echo the_title(); ?></h2>
        <img class="event-poster col-sm-6" src="<?php echo the_field('event_poster'); ?>">
        <p class="b2 event-details col-sm-6"><?php echo the_field('details'); ?></p>
        <div class="close-event"><div class="line line-1"></div><div class="line line-2"></div></div>
      </div>

  <?php 
    $current_event_month = $event_month;
    endwhile; 
    wp_reset_query(); 
  ?>
</div>