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
      <img src="<?php fc_include('img/logo.png'); ?>" class="logo">
      <ul class="menu-links flex">
        <li class="menu-link"><a href="#menu" class="hov hov-white">Menu </a></li>
        <li class="menu-link"><a href="#booking" class="hov hov-white">Reservations</a></li>
        <li class="menu-link"><a href="#events" class="hov hov-white">Events</a></li>
      </ul>
      
      <div class="pub-info">
        <p class="info-point dog white b3">Dog Friendly</p>
        <p class="info-point kid white b3">Child Friendly Until 11pm</p>
        <p class="info-point parking white b3">Free Parking</p>
      </div>
      
      <a href="https://twitter.com/thefishrdg" target="_blank"><img src="<?php fc_include('img/twitter.png'); ?>" class="social-icon twitter"></a>
      <a href="https://www.facebook.com/thefishRDG/" target="_blank"><img src="<?php fc_include('img/facebook.png'); ?>" class="social-icon facebook"></a>
      <a href="https://www.instagram.com/thefishermanscottage/" target="_blank"><img src="<?php fc_include('img/instagram.png'); ?>" class="social-icon instagram"></a>
    </div>
  </div>
  
  <div id="menu" class="home-menu">
    <div class="home-menu-content container">
      <div class="section-header flex-center">
        <p class="h2 food active hov hov-black">food</p>
        <img src="<?php fc_include('img/lifebuoy.png'); ?>" class="lifebuoy">
        <p class="h2 drink hov hov-black">drink</p>
      </div>
      
      
      
      <div id="food-menu" class="active">
        
        <?php $food_sections = get_field('food_section'); ?>
        <?php if (count($food_sections) != count($food_sections, COUNT_RECURSIVE)) : ?>
        
          <div id="menu-filter" class="home-menu-filter">
            <p class="h2 filter-title">What can I eat?</p>
            <p class="b1 filter-copy">Check out our key indicators below against the menu, or easier still, click them to filter!</p>
            <div class="filter-options">
              <div class="filter-option vegetarian" data-filter="vegetarian">
                <img src="<?php fc_include('img/menu/vegetarian.png'); ?>" alt="Vegetarian">
                <p class="b1">Vegetarian</p>
              </div>
              <div class="filter-option vegan" data-filter="vegan">
                <img src="<?php fc_include('img/menu/vegan.png'); ?>" alt="Vegan">
                <p class="b1">Vegan</p>
              </div>
              <div class="filter-option gluten" data-filter="gluten_free">
                <img src="<?php fc_include('img/menu/gluten-free.png'); ?>" alt="Gluten Free">
                <p class="b1">Gluten Free</p>
              </div>
            </div>
          </div>
        <?php endif; ?>
        
        <div class="menu-section-container">
        
          
          <?php if (count($food_sections) != count($food_sections, COUNT_RECURSIVE)) : ?>
            <?php foreach($food_sections as $food_section): ?>
              <div class="menu-section">
                <p class="h2 menu-section-title"><?php echo $food_section['section_name']; ?></p>

                <?php $menu_items = $food_section['menu_item']; ?>
                <?php foreach($menu_items as $menu_item): ?>
                  <div class="menu-item">
                    <div class="menu-item-line">
                      <p class="h2 menu-item-name">
                        <?php echo $menu_item['name']; ?>
                        <?php if($menu_item['allergen_info'] && in_array('gluten_free', $menu_item['allergen_info'])): ?>
                          <img class="allergen" src="<?php fc_include('img/menu/gluten-free.png'); ?>" alt="Gluten Free">
                        <?php endif; ?>
                        <?php if($menu_item['allergen_info'] && in_array('vegan', $menu_item['allergen_info'])): ?>
                          <img class="allergen" src="<?php fc_include('img/menu/vegan.png'); ?>" alt="Vegan">
                        <?php elseif($menu_item['allergen_info'] && in_array('vegetarian', $menu_item['allergen_info'])): ?>
                          <img class="allergen" src="<?php fc_include('img/menu/vegetarian.png'); ?>" alt="Vegetarian">
                        <?php endif; ?>
                      </p>
                      <p class="h2 menu-item-price"><?php echo $menu_item['price']; ?></p>
                    </div>
                    <div class="menu-item-line">
                      <p class="b2 menu-item-description"><?php echo $menu_item['description']; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="b1">We're currently working on a new menu! Hold tight and you should see it here soon. Or give us a call on <a href="tel:0118 956 0432">0118 956 0432</a>.<br/><br/>In the meantime, check out our drink menu!</p>
          <?php endif; ?>
          
        </div>
      </div>
      
      
      <div id="drink-menu">
        <div class="featured">
          <p class="b1 featured-title"><?php echo get_field('featured_text'); ?></p>
          <div class="featured-drinks">
            <?php echo do_shortcode('[instagram-feed num=8 cols=8 showfollow=false]'); ?>
          </div>
        </div>
        <?php $drink_sections = get_field('drink_section'); ?>
          <?php foreach($drink_sections as $drink_section): ?>
            <div class="menu-section">
              <p class="h2 menu-section-title"><?php echo $drink_section['section_name']; ?></p>

              <?php $menu_items = $drink_section['menu_item']; ?>
              <?php foreach($menu_items as $menu_item): ?>
                <div class="menu-item">
                  <div class="menu-item-line">
                    <p class="h2 menu-item-name"><?php echo $menu_item['name']; ?></p>
                    <?php if($menu_item['price_bottle']): ?>
                      <p class="h2 menu-item-price"><?php echo $menu_item['price_bottle']; ?> / <?php echo $menu_item['price_large']; ?> / <?php echo $menu_item['price_medium']; ?> / <?php echo $menu_item['price_small']; ?></p>
                    <?php else: ?>
                      <p class="h2 menu-item-price"><?php echo $menu_item['price_small']; ?></p>
                    <?php endif; ?>
                  </div>
                  <div class="menu-item-line">
                    <p class="b2 menu-item-description"><?php echo $menu_item['description']; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
      </div>
    </div>
  </div> <!-- MENU -->
  
  
  <div class="home-image-slider" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "pageDots": false, "autoPlay": true }'>
    <?php $carousel_images = get_field('image_gallery_1'); ?>
    <?php foreach($carousel_images as $image) : ?>
      <img src="<?php echo $image['url']; ?>" alt="Fisherman's Cottage Image">
    <?php endforeach; ?>
  </div>
  
  <div id="events" class="home-events">
    <div class="home-events-content container">
      <div class="section-header flex-center">
        <div class="text-center">
          <img src="<?php fc_include('img/lifebuoy.png'); ?>" class="lifebuoy">
          <h2 class="h2">Events</h2>
        </div> 
      </div>
      
      <?php include(locate_template("partials/events.php")); ?>
    </div>
  </div>
  
  <div class="home-image-slider" data-flickity='{ "imagesLoaded": true, "percentPosition": false, "wrapAround": true, "pageDots": false, "autoPlay": true  }'>
    <?php $carousel_images = get_field('image_gallery_2'); ?>
    <?php foreach($carousel_images as $image) : ?>
      <img src="<?php echo $image['url']; ?>" alt="Fisherman's Cottage Image">
    <?php endforeach; ?>
  </div>
  
  <div class="home-reviews">
    <div class="section-header flex-center">
      <h2 class="h2">Reviews</h2>
    </div>
    <?php $reviews = get_field('reviews'); ?>
    <div class="reviews" data-flickity='{ "percentPosition": false, "wrapAround": true, "pageDots": false }'>
      <?php foreach($reviews as $review) : ?>
        <div class="review">
            <div class="review-content">
              <p class="b1 comment"><?php echo $review['comment']; ?></p>
              <p class="b1 author"><?php echo $review['author']; ?></p>
            </div>  
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  
  <div id="booking" class="home-bookings">
    <div class="section-header flex-center">
      <div class="text-center">
        <img src="<?php fc_include('img/lifebuoy.png'); ?>" class="lifebuoy">
        <h2 class="h2 white">Bookings</h2>
      </div> 
    </div>
    <div class="booking-form-container">
      <p class="b1 white booking-info"><?php echo the_field('booking_form_info'); ?></p>
      <?php echo do_shortcode("[booking-form]"); ?>
    </div>
  </div>
  
  <div class="home-contact">
    <div class="section-header flex-center">
      <div class="text-center">
        <h2 class="h2">Contact Us</h2>
      </div> 
    </div>
    <div class="home-contact-content container">
      <div class="google-map-container">
        <div class="google-map"><iframe width="100%" height="100%" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=3%20Canal%20Way%2C%20Newtown%2C%20Reading%2C%20RG1%203HJ+(The%20Fisherman's%20Cottage)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a></iframe></div><br />
      </div>
      <div class="enquiry-form">
        <h2 class="h2 title">Send us a message!</h2>
        
        <div class="form-container">
          <form id="contact-form" class="contact-form">
            <label for="first_name" class="b1 col-md-3 col-xs-12">Name*</label>
            <input class="b1 col-md-9 col-xs-12" type="text" name="name" maxLength="50" required>
            <label for="email" class="b1 col-md-3 col-xs-12">E-mail Address*</label>
            <input class="b1 col-md-9 col-xs-12" type="email" name="email" maxLength="50" required>
            <label for="message" class="b1 col-md-3 col-xs-12">Message*</label>
            <textarea class="b1 col-md-9 col-xs-12" name="message" maxLength="1000" required></textarea>
            <input class="col-md-offset-3" type="submit" value="Submit">
            <input type="hidden" name="action" value="send_email">
          </form>
        </div>
      </div>
    </div>
    <div class="home-contact-social-links">
      <a href="https://twitter.com/thefishrdg" target="_blank"><img src="<?php fc_include('img/twitter_grey.png'); ?>" class="social-icon twitter"></a>
      <a href="https://www.facebook.com/thefishRDG/" target="_blank"><img src="<?php fc_include('img/facebook_grey.png'); ?>" class="social-icon facebook"></a>
      <a href="https://www.instagram.com/thefishermanscottage/" target="_blank"><img src="<?php fc_include('img/instagram_grey.png'); ?>" class="social-icon instagram"></a>
    </div>
  </div>
  
</div>

<?php get_footer() ?>
