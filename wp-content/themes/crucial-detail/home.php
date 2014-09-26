<?php
/**
 * Template Name: Home
 *
 * @package Crucial Detail
 */

get_header(); ?>
<div id="pageheader" class="winH section centercenter" style="background: url(<?$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image ?>) no-repeat center center;">
	<div>
		<object class="wordMark" data="wp-content/themes/crucial-detail/build/svg/logotype.svg" type="image/svg+xml">
		  <img src="" />
		</object>
	</div>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<? the_content(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
