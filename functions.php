<?php
/**
 * functions.php
 *
 * Child theme functions.
 */



if ( ! function_exists( 'eewc_scripts' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function eewc_scripts() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'eewc-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'twentytwentytwo-style' ),
			$version_string
		);

		wp_register_style(
			'eewc-woocommerce',
			get_stylesheet_directory_uri() . '/assets/css/plugins/woocommerce/woocommerce.css',
			array( 'woocommerce-general' ),
			null
		);

		wp_register_style(
			'eewc-jetpack-block-mailchimp',
			get_stylesheet_directory_uri() . '/assets/css/plugins/jetpack/blocks/mailchimp.css',
			array( 'jetpack-block-mailchimp' ),
			$version_string
		);


		wp_register_style(
			'eewc-jetpack-block-slideshow',
			get_stylesheet_directory_uri() . '/assets/css/plugins/jetpack/blocks/slideshow.css',
			array( 'jetpack-block-slideshow' ),
			null
		);


		// if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) && is_singular() ) {
			wp_enqueue_style(
				'eewc-yoast-reading-time',
				get_stylesheet_directory_uri() . '/assets/css/plugins/yoast/blocks/reading-time.css',
				array(),
				null
			);
		// }


		// Enqueue theme stylesheet.
		wp_enqueue_style( 'eewc-style' );


		// Enqueue WooCommerce Styles
		wp_enqueue_style( 'eewc-woocommerce' );


		// Enqueue Jetpack Mailchimp block
		wp_enqueue_style( 'eewc-jetpack-block-mailchimp' );


		// Enqueue Jetpack Mailchimp block
		wp_enqueue_style( array ('eewc-jetpack-block-slideshow' ) );


		wp_enqueue_script(
			'eewc-accordion',
			get_stylesheet_directory_uri() . '/assets/js/accordion.js',
			array( 'jquery' ),
			$version_string
		);

		// Enqueue Font Awesome Kit Setup
		wp_enqueue_script(
			'eewc-font-awesome-kit',
			get_stylesheet_directory_uri() . '/assets/js/10f5ff4207.js',
			array(),
			null
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'eewc_scripts' );






