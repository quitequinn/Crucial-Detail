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

					<? $images = get_field('top_images');

					if( $images ): ?>
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $images as $image ): ?>
					                <li>
					                    <div class="fleximg winH" style="background: url(<?php echo $image['url']; ?>) 50% 50% no-repeat;" />
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					<? endif; ?>
					<div class="flexnav winHalf">
						<a href="#" class="flexprev">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72.164px" height="159.687px" viewBox="0 0 72.164 159.687" enable-background="new 0 0 72.164 159.687" xml:space="preserve">
								<path fill="#FFFFFF" d="M72.164,159.687c-39,0-72.164-35.818-72.164-79.845C0,35.816,33.164,0,72.164,0v6.104
									c-36,0-66.061,33.079-66.061,73.738c0,40.662,30.061,73.741,66.061,73.741V159.687z"/>
								<circle fill="#FFFFFF" cx="72.164" cy="79.844" r="16.5"/>
							</svg>
						</a>
						<a href="#" class="flexnext">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72.164px" height="159.687px" viewBox="0 0 72.164 159.687" enable-background="new 0 0 72.164 159.687" xml:space="preserve">
								<path fill="#FFFFFF" d="M0.164,0c39,0,72.164,35.818,72.164,79.845c0,44.026-33.164,79.842-72.164,79.842v-6.104
									c36,0,66.061-33.079,66.061-73.738c0-40.662-30.061-73.741-66.061-73.741V0z"/>
								<circle fill="#FFFFFF" cx="0.164" cy="79.844" r="16.5"/>
							</svg>
						</a>
					</div>
				</div>
				<div class="productShare">
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
  	function changeLinks(){
  		if (iphone()) {
  			$(".optionmobile a.tshare").attr('href', "twitter://post?message=" + encodeURIComponent(document.URL));
	  		$('.share').addClass('mobile');
			$('.copyios .shareiconwrap p').text(encodeURIComponent(document.URL));

		}else{
	  		$("a.tshare").attr('href', "https://twitter.com/home?status=" + encodeURIComponent(document.URL));
	  		$("a.fshare").attr('href', "https://www.facebook.com/sharer/sharer.php?s=100&p[url]=" + encodeURIComponent(document.URL));
	  		$("a.gshare").attr('href', "https://plus.google.com/share?url=" + encodeURIComponent(document.URL));
		}
				</div>
				<div></div>
				<div class="container productMain">
					<h1 class="hbottom no-space-top"><?php echo get_the_title();?></h1>
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