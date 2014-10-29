<?php
/**
 * Template Name: Tag Page
 *
 * @package Crucial Detail
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<div id="primary" class="content-area product">
		<main id="main" class="site-main" role="main">
			<div class="row no-space-top">
				<div class="container productMain">
					<div class="grid-full">
						<section class="search not-found">
							<header class="page-header winH">
							<div class="centering">
								
								<h3>search for</h3>
								<h1 class="page-title" contenteditable> <? echo single_tag_title( '', false ); ?></h1>
							
							</div>
							</header><!-- .page-header -->
						</section>
					</div>
				</div>
			</div>

<?	wp_reset_postdata();

			$args = array( 
				'post__not_in' => array($post->ID),
				'post_type' => array( 'product', 'thoughts' ),
				'tag' => single_tag_title( '', false ));
			query_posts( $args ); 
			while ( have_posts() ) : the_post();?>

			<div class="tagBackground section">
			<div class="tagIMG" style="height: 100px; background: url('<?echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>') no-repeat center center;"></div>
			<a class="tagrow" href="<?php the_permalink() ?>" >
			<div class="row no-space-top">
				<div class="container productMain">
					<div class="grid-full">
						<h2><? the_title(); ?></h2>
						<div class="p textWrap maxTextWidth"><? the_excerpt(); ?></div>
					</div>
				</div>
			</div>
			</a>
			</div>

			<? endwhile;

		?>



					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
