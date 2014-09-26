<?php
/**
 * The info sidbar.
 *
 * @package Crucial Detail
 */
?>
<!-- 
<div class="infoHidder"></div>		
<div id="st-container" class="st-container infoBar">
	<div class="st-pusher">
		<nav class="st-menu st-effect-7" id="menu-7">
		<h4 class="container">infos</h4>
		<a class="infoBarButton" href="#"><i class="fa fa-times"></i></a>

		<div class="featuredinfos row no-space-top">
			<?  $args = array( 
					'post_type' => 'info', 
					'posts_per_page' => 99999);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>
				  <div class="infoIndexBlock half" style="background: url('<?$feat_image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));echo $feat_image ?>') no-repeat center center;">
					<div class="infoBlockInfo centerOuterWrap">
						<a class="centerWrap" href="<?php the_permalink() ?>">
							<h3 class="no-space"><? echo get_field( "price" ); ?></h3>
							<h4 class="no-space-top"><? the_title(); ?></h4>
						</a>
					</div>
				  </div>
				<? endwhile;
				wp_reset_postdata(); ?>
			</div>
		</nav>

	</div>
</div> -->

