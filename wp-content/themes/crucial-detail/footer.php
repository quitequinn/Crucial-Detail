<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Crucial Detail
 */
?>

	</div><!-- #content -->
	<div class="featuredProducts section row no-space-top">
		<?	wp_reset_postdata();

			$args = array( 
				'post__not_in' => array($post->ID),
				'post_type' => 'product', 
				'posts_per_page' => 12 , 
				'meta_key' => 'featured',
				'meta_value' => true);
			query_posts( $args ); 
			while ( have_posts() ) : the_post();?>
			  <div class="productBlock third" style="background: url('<?$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image ?>') no-repeat center center;">
				<div class="productBlockInfo centerOuterWrap">
					<a class="centerWrap" href="<?php the_permalink() ?>">
						<h3 class="no-space"><? echo get_field( "price" ); ?></h3>
						<div class="smallLine"></div>
						<h4><? the_title(); ?></h4>
					</a>
				</div>
			  </div>
			<? endwhile;

		?>
	</div>
	<footer id="colophon" class="site-footer container section" role="contentinfo">
		<div class="row emailSubscription">
			<div class="grid-full">
	  			<input type="text" name="fname" class="h2" placeholder="Your Email">
	  			<h4>So you can keep in touch</h4>
	  		</div>
		</div>
		<div class="row info">
			<div class="grid-half offset-fourth"><?php the_field('footer_info', 19); ?></div>

<? query_posts( $args ); wp_reset_postdata();
if(get_field('locations', 19)){ ?>
	<p>
	<? while(has_sub_field('locations', 19)){ ?>
		<strong><? the_sub_field('location'); ?></strong>
		<? if( have_rows('rows') ){ ?>
			<? while( have_rows('rows')){ the_row();?>
				<br/>
				<? if( get_sub_field('link')) { ?>
					<a href="<?the_sub_field('link');?>"><?the_sub_field('text');?></a>
				<? } else { ?>
					<span><?the_sub_field('text');?></span>
				<? } ?>
			<? } ?>
			<br/>
		<? } ?>
		<br/>
	<? } ?>
	</p>
<? } ?>


		</div>
	</footer><!-- #colophon -->
	<section class="footer">
		<div class="third"></div>
		<div class="third bg-gray-dark"></div>
		<div class="third bg-white socialPrimary">
			<a class="glyph-icon glyph_icon_mail_circle" href="#"></a>
			<a class="glyph-icon glyph_icon-facebook" href="#"></a>
			<a class="glyph-icon glyph_icon-twitter" href="#"></a>
		</div>
	</section>
</div><!-- #page -->

<!-- Javascript -->
<!-- In the footer for better performance -->
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/jquery.scrolly.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/waypoints.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/vendor/flexslider/jquery.flexslider-min.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/vendor/fitvids/jquery.fitvids.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/scripts.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!-- (Via HTML5 Boilerplate: http://html5boilerplate.com/) -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<?php wp_footer(); ?>

</body>
</html>
