<?php
/**
 * Title: Header inside hero
 * Slug: write-white/header-hero
 * Categories: header, banner, call-to-action
 * Keywords: header, nav, links, button
 * Viewport Width: 1500
 * Block Types: core/template-part/header
 * Inserter: true
 */
?>

<!-- wp:cover {"metadata":{"name":"Merged banner with header"},"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/pexels-antonio-quagliata-227433.jpg","dimRatio":50,"isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","style":{"color":{"duotone":"var:preset|duotone|blue-and-lavender"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:100vh" id="header-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-dim "></span>
<img class="wp-block-cover__image-background " alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/pexels-antonio-quagliata-227433.jpg" data-object-fit="cover" />
    <div class="wp-block-cover__inner-container">
		
		<!-- wp:pattern {"slug":"easyenglishwithcristina/header-default"} /--> 

		<!-- wp:columns {"align":"wide","style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"></div>
			<!-- /wp:column -->
				 
			<!-- wp:column {"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"white-semi-trasparent","textColor":"contrast"} -->
			<div class="wp-block-column is-vertically-aligned-center has-contrast-color has-white-semi-trasparent-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
				<!-- wp:site-tagline {"style":{"typography":{"textTransform":"uppercase","fontWeight":"300"}},"textColor":"secondary"} /-->
			
				<?php get_template_part( 'template-parts/content/content-banner' , null, 'english-for-beginners' ); ?>
				 		 
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( 'english-for-beginners/' ) ); ?>"><?php echo esc_html_x( 'English for Beginners →', 'easyenglishwithcristina' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		
		</div>
		<!-- /wp:columns -->
	
		<!-- wp:spacer {"height":"80px"} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
    </div>
</div>
<!-- /wp:cover -->
