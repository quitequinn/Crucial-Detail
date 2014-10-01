<?php
/**
 * The template for displaying all single products.
 *
 * @package Crucial Detail
 */

get_header(); ?>



	<div id="primary" class="content-area product">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="section row no-space-top">
				<div class="productSlideshow">
					<? echo get_field("slideshow") ?>
				</div>
				<div class="productShare">
					
				</div>
				<div></div>
				<div class="container productMain">
					<h1><?php echo get_the_title();?></h1>
					<div class="tags">
						<strong></strong>
					</div>
					<div class="textWrap maxTextWidth">
						<?php echo get_the_content();?>
					</div>
				</div>
			</div>
			<div class="dropIns">
				<div class="grid-two-thirds">
					<? echo get_field("drop-ins") ?>
				</div>
				<div class="grid-one-third">
					<div class="productPrice">
						<? echo get_field("price") ?>
					</div>
					<div class="buy">
						
					</div>
					<div class="specs">
						<? echo get_field("specifications") ?>
					</div>
				</div>
			</div>
			</div>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>