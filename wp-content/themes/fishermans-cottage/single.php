<?php
/**
 * The template for individual posts
 *
 * @package fishermans-cottage
 * @since fishermans-cottage 0.1
 */

get_header() ?>

<?php while ( have_posts() ) : the_post() ?>

<?php endwhile ?>

<?php get_footer() ?>
