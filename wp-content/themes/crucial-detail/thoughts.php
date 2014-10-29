<?php
/**
 * Template Name: Thoughts
 *
 * @package Crucial Detail
 */

get_header(); ?>

<?
$args = array( 
	'post__not_in' => array($post->ID),
	'post_type' => 'thoughts', 
	'posts_per_page' => 1
	);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();?>
	<? get_template_part( 'single-thought' ); ?>
<? endwhile;
wp_reset_postdata();
?>

<?php get_footer(); ?>
