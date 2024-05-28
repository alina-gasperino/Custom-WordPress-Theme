<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return single_term_title() . ":";
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * Get related posts
     */
    public static function related()
    {
      // Default arguments
      $args = array(
      	'posts_per_page' => 12, // How many items to display
      	'post__not_in'   => array( get_the_ID() ), // Exclude current post
      	//'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
      );

      // Check for current post category and add tax_query to the query arguments
      $cats = wp_get_post_terms( get_the_ID(), 'category' );
      $cats_ids = array();

      foreach( $cats as $wpex_related_cat ) {
      	$cats_ids[] = $wpex_related_cat->term_id;
      }

      if ( ! empty( $cats_ids ) ) {
      	$args['category__in'] = $cats_ids;
      }

      // Query posts
      $related = new wp_query( $args );

      return $related;
    }
}
