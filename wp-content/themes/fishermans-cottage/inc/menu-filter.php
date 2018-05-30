<?php
/**
 * Functions that filter menu
 *
 * @package fishermans-cottage
 * @since fishermans-cottage 0.1
 */

function fc_filter_menu() {

  $filters = $_POST[ 'filters' ];
  $frontpage_id = get_option( 'page_on_front' );
  
  if ( isset( $filters ) ) {
    
    $filter_matches = [];
    
    $food_sections = get_field('food_section', $frontpage_id);
    foreach($food_sections as $food_section):
      $menu_items = $food_section['menu_item'];  
      foreach($menu_items as $menu_item):
      $add_to_matches = false;
        foreach($menu_item['allergen_info'] as $allergen) :
          foreach($filters as $filter):
            if($filter === $allergen) :
              $add_to_matches = true;
            elseif($filter === 'vegetarian' && $allergen === 'vegan'):
              $add_to_matches = true;
            endif;
          endforeach;
        endforeach;
        if($add_to_matches) : 
          if(array_key_exists($food_section['section_name'],$filter_matches)):
            array_push($filter_matches[$food_section['section_name']], $menu_item);
          else: 
            $filter_matches[$food_section['section_name']] = [$menu_item];
          endif;       
        endif;
      endforeach;
    endforeach;
    
    foreach($filter_matches as $key => $filter_match): ?>
    <div class="menu-section">
      <p class="h2 menu-section-title"><?php echo $key; ?></p>
      <?php foreach($filter_match as $menu_item): ?>
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
  <?php endforeach;
  } else {
    $food_sections = get_field('food_section', $frontpage_id);
    foreach($food_sections as $food_section): ?>
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
    <?php endforeach;
  }
  
  
  
  return;
  die();
}

add_action( 'wp_ajax_fc_filter_menu', 'fc_filter_menu' );
add_action( 'wp_ajax_nopriv_fc_filter_menu', 'fc_filter_menu' );







        
          