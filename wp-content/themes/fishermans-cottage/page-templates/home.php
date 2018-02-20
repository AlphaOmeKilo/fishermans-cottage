<?php
/**
 * Template Name: Home
 *
 * @package fishermans-cottage
 * @since fishermans-cottage 0.1
 */

get_header() ?>

<div class="home">
  <div class="home-intro flex-center">
    <div class="home-intro-content">
      <img src="<?php fc_include('img/logo.svg'); ?>" class="logo">
      <ul class="booking-links flex">
        <li class="booking-link">Menu</li>
        <li class="booking-link">Bookings</li>
        <li class="booking-link">Events</li>
      </ul>
      
      <a href="https://twitter.com/thefishrdg" target="_blank"><img src="<?php fc_include('img/twitter.png'); ?>" class="social-icon twitter"></a>
      <a href="https://www.facebook.com/thefishRDG/" target="_blank"><img src="<?php fc_include('img/facebook.png'); ?>" class="social-icon facebook"></a>
      <a href="https://www.instagram.com/thefishermanscottage/" target="_blank"><img src="<?php fc_include('img/instagram.png'); ?>" class="social-icon instagram"></a>
    </div>
  </div>
  
  <div class="home-menu">
    <div class="home-menu-content container">
    
    </div>
  </div>
</div>

<?php get_footer() ?>
