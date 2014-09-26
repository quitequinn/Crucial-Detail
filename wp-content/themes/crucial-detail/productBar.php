<?php
/**
 * The product sidbar.
 *
 * @package Crucial Detail
 */
?>

<div class="st-pusher">
	<div class="hidder"></div>
	<nav class="st-menu productSidebar" id="productSidebar">
		<h3 class="container">Products</h2>

	<div class="featuredProducts row no-space-top">
		<?  $args = array( 
				'post_type' => 'product', 
				'posts_per_page' => 99999);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();?>
			  <div class="productIndexBlock half" style="background: url('<?$feat_image=wp_get_attachment_url(get_post_thumbnail_id($post->ID));echo $feat_image ?>') no-repeat center center;">
				<div class="productBlockInfo centerOuterWrap">
					<a class="centerWrap" href="<?php the_permalink() ?>">
						<h3 class="no-space"><? echo get_field( "price" ); ?></h3>
						<h4><? the_title(); ?></h4>
					</a>
				</div>
			  </div>
			<? endwhile;
			wp_reset_postdata(); ?>
	</div>



	</nav>
</div>

