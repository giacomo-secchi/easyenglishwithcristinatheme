<?php
/**
 * Plugin Name: Project engine room
 * Author: Giacomo Secchi
 * Author URI: https://giacomosecchi.com
 * Version: 1.0.0
 */

/* Place custom code below this line. */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (is_readable(__DIR__ . '/config/contentBridge.php')) {
    require_once __DIR__ . '/config/contentBridge.php';
}




// custom code for the current project


/**
 * Set the environment type
 * @link https://make.wordpress.org/core/2020/07/24/new-wp_get_environment_type-function-in-wordpress-5-5/
 */
if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) ) {
	define( 'WP_ENVIRONMENT_TYPE', 'production' );
}



add_filter(
	'writepoetry_register_theme_directories',
	function () {
		return array( 'easyenglishwithcristina-website/themes' );
	}
);


// Disable Plugin and Theme Update and Installation
define( 'DISALLOW_FILE_MODS', false );





// Enable maintenance mode
add_filter( 'pre_option_writepoetry_maintenance_mode', function ( $default ) {
	return '0';
} );



// Choose to enable or disable product image zoom on product page (to disable change 'yes' to 'no')
add_filter( 'pre_option_writepoetry_product_zoom', function ( $default ) {
	return 'no';
} );


add_filter( 'pre_option_writepoetry_product_quantity_layout', function ( $default ) {
	// 'hidden';
	// 'input';
	// 'buttons';
	// 'select';
	return 'hidden';
} );


// Choose to what page redirect after add to cart
add_filter( 'pre_option_writepoetry_redirect_after_add', function ( $default ) {
	// 'product-checkout';
	// 'product-cart';
	// 'checkout';
	// 'cart';
	return 'checkout';
} );


add_filter( 'pre_option_writepoetry_product_min_quantity', function ( $default ) {
	return 1;
} );


add_filter( 'pre_option_writepoetry_product_max_quantity', function ( $default ) {
	return 10;
} );


// What kind of design do you want for single product page additional info (possible vaules are accordion, tabs or list)
add_filter( 'pre_option_writepoetry_product_infos_layout', function ( $default ) {
	// 'tabs'
	// 'list'
	// 'accordion'
	return 'list';
} );


// Disable elements
add_filter( 'writepoetry_disable_features', function ( $args ) {
	$args[] = 'woocommerce_sale_flash';
	// $args[] = 'woocommerce_twenty_twenty_two_styles';

	return $args;
}, 10, 1 );


// Add parameters to url
add_filter( 'writepoetry_query_vars', function () {
    return array( 'show-wheel' );
} );


add_action( 'plugins_loaded', function () {
	// Hide WooCommerce Breadcrumbs
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	// Hide Single product informations (SKU, Category, tags) and all that is hooked on woocommerce_product_meta_start and woocommerce_product_meta_end
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
});


add_action( 'woocommerce_email_order_details', function ($order, $sent_to_admin, $plain_text, $email){
	$plain_text = "<p><?php esc_html_e( 'You will receive a Google Meet link one day before the lesson will take place.', 'storefrontchild' ); ?></p>";

}, 10, 4 );



add_filter( 'woocommerce_product_tabs', function( $tabs ) {

	// Remove additional information tab on Product Page
	unset( $tabs['reviews'] );

	return $tabs;

}, 20 );




// Hide Clear Link | WooCommerce Variable Products
add_filter( 'woocommerce_reset_variations_link', '__return_empty_string', 9999 );

add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

add_filter( 'mcf_add_custom_taxonomies', function () {
 	$string = array(
		'product-type' => array(
			'post_type' => 'product',
			'labels' => array(
				'name' => esc_html( 'Product Type' )
			),
			'show_ui'                    => true,
			// 'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true
		),
		'product-format' => array(
			'post_type' => 'product',
			'labels' => array(
				'name' => esc_html( 'Product Format' )
			),
			'show_ui'                    => true,
			'show_tagcloud'              => true
		),
	);

	return $string;
}, 10, 3 );


// Remove Additional Information section heading and content
add_filter( 'writepoetry_plugin_remove_testimonial_link', '__return_true' );

 
 
 /* Exclude One Content Type From Yoast SEO Sitemap */
add_filter(
   'wpseo_sitemap_exclude_post_type',
   function( $value, $post_type ) {
      if ( 
         $post_type == 'jetpack-testimonial' 
      ) {
         return true;
      }
   }, 10, 2 ); 
   

/**
 * Redirect single posts to 404.
*/
add_action( 'template_redirect', function () {
   $post_type = 'jetpack-testimonial';
   
   if ( is_post_type_archive( $post_type ) || is_singular( $post_type ) ) {
      global $wp_query;
      
      $wp_query->set_404();
      status_header( 404 );
      nocache_headers();
      get_template_part( '404' );
   }
}  );



add_filter(
	'writepoetry_add_custom_fields_to_page',
	function () { 

		return array(
			'easyenglishwithcristina_offer_description',
			'easyenglishwithcristina_offer_element_1',
			'easyenglishwithcristina_offer_element_2',
			'easyenglishwithcristina_offer_element_3',
			'easyenglishwithcristina_offer_element_4',
		);
	},
	10,
	3
);

// Custom Language Switcher output
add_action( 'custom_language_span_output', function ( $args, $short_language_name, $language_name, $flag_link ) {
   return '<span><img src="' . $flag_link .'">&nbsp;' . strtoupper( $short_language_name ) . '</span>';
}, 10, 4 );




add_filter( 'woocommerce_checkout_fields', function ( $fields ) {
   // Unset fields you want to remove
   unset( $fields['billing']['billing_company'] );
   unset( $fields['billing']['billing_address_1'] );
   unset( $fields['billing']['billing_address_2'] );
   unset( $fields['billing']['billing_postcode'] );
   unset( $fields['billing']['billing_city'] );
   unset( $fields['billing']['billing_phone'] );
   unset ($fields['billing']['billing_country'] );
   
   
   return $fields;
} );

// Remove Additional Information section heading and content
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

add_filter( 'blankspace_enable_dashicons', '__return_true' );




// Exclude sticky posts from main query and set posts per page to 12.
add_action('pre_get_posts', function ( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
		$sticky_posts = get_option( 'sticky_posts' );
        
		if ( ! empty( $sticky_posts ) ) {
            $query->set( 'post__not_in', $sticky_posts );
        }
		$query->set( 'posts_per_page', 12 );

    }
}, 10, 2 );



