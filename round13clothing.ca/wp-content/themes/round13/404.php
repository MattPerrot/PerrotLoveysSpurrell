<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage blaklisted
 * @since 
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title">Page Not Found</h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. ' ); ?></p>

				
			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
<?php

get_footer();
