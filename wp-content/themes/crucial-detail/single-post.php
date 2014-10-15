<?php
/**
 * The template for displaying all single posts.
 *
 * @package Crucial Detail
 */

get_header(); ?>
	<div id="primary" class="content-area product">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="row no-space-top">
				<div class="section productSlideshow">
					<div class="fleximg winH" style="background: url(<?php echo get_field('top_image') ?>) 50% 50% no-repeat;">

					</div>
				</div>
				<div class="container productMain">
					<div class="grid-full">
						<h1 class="hbottom hbottomTarget no-space-top"><?php echo get_the_title();?></h1>
						<div class="productShare">
							<a href="https://twitter.com/home?status=<? get_permalink() ?>" target="_black" class="tshare"><i class="fa fa-twitter"></i></a>
							<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<? get_permalink() ?>" target="_black" class="fshare"><i class="fa fa-facebook"></i></a>
							<a href="https://plus.google.com/share?url=<? get_permalink() ?>" target="_black" class="lishare"><i class="fa  fa-google-plus"></i></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<? get_permalink() ?>" target="_black" class="lishare"><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="tags">
							<p class="text-small smallcaps"><strong>
							<? $posttags = get_the_tags();
							if ($posttags) {
							  foreach($posttags as $tag) {?>
							  	<a href="<?php echo get_tag_link($tag);?>">
							    <? echo $tag->name; ?>
							    </a>
							  <?}
							} ?>
							</strong></p>
						</div>
						<div class="textWrap section largeP maxTextWidth">
							<?php echo the_content();?>
						</div>
					</div>
				</div>
			</div>
			<div class="dropIns">
				<div class="container">
					<div class="grid-full">
						<? if( have_rows('drop-ins') ):
						while ( have_rows('drop-ins') ) : the_row();
								get_template_part( 'dropins' );
						endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>