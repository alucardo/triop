<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


add_action( 'init', 'create_product' );
function create_product() {
  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __( 'Produkty' ),
        'singular_name' => __( 'Produkt' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'products'),
    )
  );
}


add_action( 'init', 'create_baners' );
function create_baners() {
  register_post_type( 'baners',
    array(
      'labels' => array(
        'name' => __( 'Banery' ),
        'singular_name' => __( 'Baner' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'banery'),
    )
  );
}

add_action( 'init', 'create_team' );
function create_team() {
  register_post_type( 'teams',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'team'),
    )
  );
}

add_action( 'init', 'create_about' );
function create_about() {
  register_post_type( 'about',
    array(
      'labels' => array(
        'name' => __( 'O nas' ),
        'singular_name' => __( 'About' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'about'),
    )
  );
}

require_once locate_template('/lib/product.php');  