<?php
/**
 * The template for displaying all single thoughts.
 *
 * @package Crucial Detail
 */

get_header(); ?>



	<div id="primary" class="content-area thought">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row no-space-top">
				<div class="section thoughtSlideshow">

					<? $images = get_field('top_images');
					if( $images ): 
					$slides = 0; ?>
					    <div id="slider" class="flexslider">
					        <ul class="slides">
					            <?php foreach( $images as $image ): 
					            $slides = $slides + 1; ?>
					                <li>
					                    <div class="fleximg winH" style="background: url(<?php echo $image['url']; ?>) 50% 50% no-repeat;" />
					                </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					    <? if ($slides > 1): ?>
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
						<? endif; ?>
					<? endif; ?>
				</div>
				<div class="container thoughtMain">
					<div class="grid-full">
						<h1 class="hbottom hbottomTarget no-space-top"><?php echo get_the_title();?></h1>
						<div class="thoughtShare">
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