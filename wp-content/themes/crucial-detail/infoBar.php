<?php
/**
 * The info sidbar.
 *
 * @package Crucial Detail
 */
?>
<div class="st-container infoBar">
	<div class="st-pusher">

		<div class="grid-third socialPrimary">
			<a class="glyph-icon glyph_icon_mail_circle" href="#"></a><span class="hideSmall"><br/></span>
			<a class="glyph-icon glyph_icon-facebook" href="#"></a><span class="hideSmall"><br/></span>
			<a class="glyph-icon glyph_icon-twitter" href="#"></a>
		</div>
		<div class="grid-two-third offset-third">
			<div class="grid-full">
				<h2 class="no-space"><?php echo get_the_title( 19 );?></h2>
				<a class="infoBarButton" href="#"><i class="fa fa-times"></i></a>
				<?php echo apply_filters('the_content', get_page_by_title( 'info' ) -> post_content); ?>
			</div>

			<div class="grid-half">
				<?php the_field('awards', 19); ?>
				<?php the_field('press', 19); ?>
				<?php the_field('apearances', 19); ?>
			</div>
			<div class="grid-half">


				<? 
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
		</div>
	</div>
</div>

