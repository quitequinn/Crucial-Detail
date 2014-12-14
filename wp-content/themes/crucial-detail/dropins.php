<?php
/**
 * The Dropin List
 *
 * @package Crucial Detail
 */
?>

<?php

        if( get_row_layout() == 'text' ): ?>
	        <div class="dropIn-text <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        <? if ( get_sub_field('title')) {?>
	        	<h4><? the_sub_field('title'); ?></h4>
	        <? }?>
	        	<? the_sub_field('text'); ?>
	        </div>

        <? elseif( get_row_layout() == 'faq' ): ?>
	        <h4>FAQ</h4>
	        <div class="dropIn-faq <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        	<? the_sub_field('faq'); ?>
	        </div>

        <? elseif( get_row_layout() == 'tips' ): ?>

	        <div class="dropIn-tips <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        <h4>Tips</h4>
	        	<? the_sub_field('tips'); ?>
	        </div>

        <? elseif( get_row_layout() == 'includes' ): ?>
	        <div class="dropIn-includes <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        <h4>Includes</h4>
	        		<? the_sub_field('includes'); ?>
	        </div>

        <? elseif( get_row_layout() == 'picture' ): ?>
        	</div> 
        	</div>
	        <div class="dropIn-picture <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        	<? $image = get_sub_field('picture_img');?>
	        	<div class="imgDiv" style="background: url('<? echo $image['url'];?>') 50% 50%;">
				<? if ( get_sub_field('picture_text')) {?>
	        		<h2 class="imgText <?if ( get_sub_field('overlay')){?>imgOverlay<?}?>">
						<? the_sub_field('picture_text'); ?>
					</h2>
	        	<?}?>
	        	</div>
	        </div>
			<div class="container">
			<div class="grid-two-thirds text-small">
        <? elseif( get_row_layout() == 'shown_in' ): ?>

	        <div class="dropIn-text <?if ( get_sub_field('nav_section')){?>section<?}?>">
	        		<? the_sub_field('text'); ?>
	        </div>

        <? elseif( get_row_layout() == 'series' ): ?>
        	</div> 
        	</div>
	        <div class="dropIn-text <?if ( get_sub_field('nav_section')){?>section<?}?>">
				<? $image = get_sub_field('series_image');?>
				<img src="<? echo $image['url'];?>">

	        	<? if(have_rows('series')): ?>
	        	<div class="seriesCulumns <?if(get_sub_field('overlap_image')){ echo "neg-space-top";}?>">
				<? 
				$rows = 0;
				while( have_rows('series') ): the_row(); 
					$rows = $rows+1;
				endwhile;
				while( have_rows('series') ): the_row(); 
					if ($rows==1) {
						$rowAmount='full';
					}elseif ($rows==2) {
						$rowAmount='half';
					}elseif ($rows==3) {
						$rowAmount='third';
					}elseif ($rows==4) {
						$rowAmount='fourth';
					}elseif ($rows==5) {
						$rowAmount='fifth';
					}elseif ($rows==6) {
						$rowAmount='sixth';
					} ?>

					<div class="grid-<?echo $rowAmount;?>">
						<div class="productPrice">
							<h1 class="no-space-bottom"><? echo get_field("price") ?></h1>
						</div>
						<div class="buy">
							<a href="#" class="textCenter addCart"><span><h4><b>Add to Cart</b></h4></span></a>

							<? if( get_sub_field('availability') == 'Available' ) {?>
								<a href="#" class="textCenter addCart"><span><h4><b>Add to Cart</b></h4></span></a>
							<?} else if (get_sub_field('availability') == 'Back Order') {?>
								<a href="#" class="textCenter backOrder"><span><h4><b>Back Order</b></h4></span></a>
							<?} else if (get_sub_field('availability') == 'Sold Out') {?>
								<div class="textCenter soldOut"><span><h4><b>Sold Out</b></h4></span></div>
							<?}?>
						</div>
						<div class="specs text-small">
							<? echo get_field("specs") ?>
						</div>
					</div>

				<?php endwhile; ?>
				</div>
			<?php 
			$rows = 0;
			endif; ?>

	        </div>
			<div class="container">
			<div class="grid-two-thirds text-small">

        <? elseif( get_row_layout() == 'video' ): ?>
        	</div> 
        	</div>

	        <div class="dropIn-video respVideo <?if ( get_sub_field('nav_section')){?>section<?}?>">
			<?php

				$value = get_sub_field('video');

				$value = preg_replace('/src="(.+?)"/', 'src="$1?portrait=0&color=fff&byline=0&badge=0&title=0"', $value);

				echo $value;

			?>
	        </div>
			<div class="container">
			<div class="grid-two-thirds text-small">

        <? endif;
?>
