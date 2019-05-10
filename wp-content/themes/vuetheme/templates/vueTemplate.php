<?php
/**
 * 
 * Template Name: Vue Map
 * 
 * The template for displaying vue map
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>
			<noscript>
      	<strong>We're sorry but markers doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    	</noscript>
			<div id="appMap"></div>
    	<!-- built files will be auto injected -->
			<div id="mapFooter">Made with ❤️ <a href="http://michaeldyczkowski.co.uk" target="_">@mdzoon</a></div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();