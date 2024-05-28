<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);

/**
 * Wakler used for sub menu
 */
class Roots_Sub_Walker_Custom extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        $category = get_field('related_category', $item);

        if ($category) {
            $categoryID = $category[0];
            $cats = get_categories(['child_of' => $categoryID]);
            if ($cats) {
                $dropdown = '<div class="sub-menu--drop dropdown-' . $categoryID . '"><div class="d-flex justify-content-between">';
                $dropdown .= '<ul class="mega-sub-nav">';
                foreach ($cats as $cat) {
                    $dropdown .= '<li><a href="' . get_category_link($cat->term_id) . '" class="sm-headline">' . $cat->name . '</a></li>';
                }
                $dropdown .= '</ul>';

                // query 6 most recent from parent category
                $args = ['post_type' => 'post', 'category__in' => $categoryID, 'posts_per_page' => 6];
                $loop = new WP_Query($args);
                $dropdown .= '<div class="d-flex w-100 justify-content-start">';
                while ($loop->have_posts()): $loop->the_post();
                    $dropdown .= '<div class="gap-25 align-center">';
                    $dropdown .= '<a href="' . get_the_permalink() . '">';
                    $dropdown .= '<div class="post--related-wrapper">';
                    $dropdown .= '<img src="' . get_image_size_src('featured_image', 'slider') . '" alt="">';
                    $dropdown .= '<div class="sm-headline margin-top--20">' . get_primary_category(get_the_ID()) . '</div>';
                    $dropdown .= '<h2 class="headline-3 margin-top--10 font-cadiz-light">' . get_the_title() . '</h2>';
                    $dropdown .= '</div>';
                    $dropdown .= '</a>';
                    $dropdown .= '</div>';
                endwhile;
                $dropdown .= '</div>';

                $dropdown .= '</div></div>';

                $output .= $dropdown;
            }
        }
    }
}

/**
 * Return primary category
 */
function get_primary_category($postID = false)
{
    $cat = new WPSEO_Primary_Term('category', $postID);
    $cat = $cat->get_primary_term();
    $cat = get_category($cat);

    if (isset($cat->name)) {
        return $cat->name;
    } else {
        $category = get_the_category();
        if ($category) {
            return $category[0]->cat_name;
        }
    }

    return false;
}

/**
 * Return primary category
 */
function get_primary_category_url($postID = false)
{
    $cat = new WPSEO_Primary_Term('category', $postID);
    $cat = $cat->get_primary_term();
    $catLink = get_category_link($cat);
    return $catLink;
}

/**
 * Get the blog featured image sizes
 */
function get_image_size_src($field, $size = 'full')
{
    $imageID = get_field($field);
    $image = wp_get_attachment_image_src($imageID, $size);

    return $image[0];
}

function get_acf_image_by_id($imageID, $size = 'full')
{
    $image = wp_get_attachment_image_src($imageID, $size);
    return $image[0];
}

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
    $category = get_field('related_category', $item);

    $categoryID = $category[0];
    $atts['data-dropdown'] = 'dropdown-' . $categoryID;
    return $atts;
}, 10, 3);

add_filter('gform_confirmation_anchor', '__return_false');

/**
 * Load More
 */
function vanish_loadmore_ajax_handler()
{
    $page = $_REQUEST['page'];
    $postID = $_REQUEST['related_to'];
    $offset = $_REQUEST['offset'];
    $cat = $_REQUEST['category'];
    $newOffset = $offset + 8;

    // Default arguments
    $args = array(
        'posts_per_page' => 8, // How many items to display
        //'post__not_in'   => array( $postID ), // Exclude current post
        //'paged'          => $page,
        'cat' => $cat,
        'offset' => $offset,
        'post_status' => 'publish',
        //'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
    );

    // Query posts
    $related = new wp_query($args);

    if ($related->have_posts()) {
        $content .= '<div class="d-flex flex-wrap justify-content-lg-center row-30 cat-list articles-added">';
        while ($related->have_posts()): $related->the_post();
            $content .= App\template('partials.content-sm', [$colSm => 'col-12']);
        endwhile;
        $content .= '</div>';
        wp_reset_query();
        //echo json_encode(['message' => 'we have related posts']);
    } else {
        $content = "";
        echo json_encode(['data' => $content, 'hide' => true]);
        die();
    }

    echo json_encode(['data' => $content, 'offset' => $newOffset, 'hide' => false]);

    die();

}
add_action('wp_ajax_vanish_loadmore', 'vanish_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_vanish_loadmore', 'vanish_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

/**
 * Load More
 */
function vanish_loadmore_related()
{

    $postID = $_REQUEST['current_id'];
    $offset = $_REQUEST['offset'];
    $newOffset = $offset + 8;

    $cats = wp_get_post_terms(get_the_ID(), 'category');
    $cats_ids = array();

    foreach ($cats as $wpex_related_cat) {
        $cats_ids[] = $wpex_related_cat->term_id;
    }

    // Default arguments
    $args = array(
        'posts_per_page' => 8, // How many items to display
        'post__not_in' => array($postID), // Exclude current post
        'offset' => $offset,
        'post_status' => 'publish',
        //'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
    );

    if (!empty($cats_ids)) {
        $args['category__in'] = $cats_ids;
    }

    // Check for current post category and add tax_query to the query arguments
    $cats = wp_get_post_terms($postID, 'category');
    $cats_ids = array();

    foreach ($cats as $wpex_related_cat) {
        $cats_ids[] = $wpex_related_cat->term_id;
    }

    if (!empty($cats_ids)) {
        $args['category__in'] = $cats_ids;
    }

    // Query posts
    $related = new wp_query($args);

    if ($related->have_posts()) {
        $content .= '<div class="d-flex flex-wrap justify-content-lg-center row-30 cat-list articles-added">';
        while ($related->have_posts()): $related->the_post();
            $content .= App\template('partials.content-sm', [$colSm => 'col-12']);
        endwhile;
        $content .= '</div>';
        //echo json_encode(['message' => 'we have related posts']);
    } else {
        $content = "";
        echo json_encode(['data' => $content, 'hide' => true]);
        die();
    }

    echo json_encode(['data' => $content, 'offset' => $newOffset, 'hide' => false]);

    die();

}
add_action('wp_ajax_vanish_loadmore_related', 'vanish_loadmore_related'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_vanish_loadmore_related', 'vanish_loadmore_related'); // wp_ajax_nopriv_{action}

add_filter('gform_duplicate_message_1', 'change_message', 10, 2);
function change_message($message, $form)
{
    return 'Your email is already subscribed.';
}

add_action('wp_footer', 'print_my_script');
function print_my_script()
{
    echo "<script>jQuery(function() {jQuery('body').on('click', '.modal--wrapper #gform_submit_button_1', function() {
   setTimeout(function() {
    if ('#validation_message_1_1:contains(\"This email is already subscribed.\")') {
	jQuery('.modal--wrapper #gform_fields_1').append('This email has already been subscribed');
    }
}, 2000);
}); }); </script>";
}

function theme_assets() {
    wp_enqueue_script( 'joon-scripts', '/wp-content/themes/joon/dist/scripts/main.js', ['shopwp-public'], '', true);
     wp_enqueue_script( 'joon-marqueecdn-scripts', '/wp-content/themes/joon/dist/scripts/jquery.marquee.min.js', ['shopwp-public'], '', true);
     //wp_enqueue_script( 'joon-marquee-scripts', '/wp-content/themes/joon/dist/scripts/vertical-marquee.js', ['shopwp-public'], '', true);
}

add_action('wp_enqueue_scripts', 'theme_assets');

