<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Crucial Detail
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- SITE DESIGNED BY QUINN KEAVENEY @ quinnkeaveney.com -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Force latest available IE rendering engine and Chrome Frame (if installed) -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- OGG Title & Description -->
<meta property="og:site_name" content=""/>
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>
<meta name="description" content="">
<meta name="keywords" content="" />
<meta property="og:description" content="<?php bloginfo('description'); ?> "/>
<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/fav.ico">
<meta property="og:url" content="<?php bloginfo('url'); ?> ">
<meta http-equiv="content-type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>">
<?//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="1651830633"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="Lvl3"/>';
	if(!has_post_thumbnail( $post->ID )) {}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
}
add_action( 'wp_head', 'insert_fb_in_head', 5 ); ?>

<!-- Favicon -->
<link rel="shortcut icon" type="image/ico" href="<?php echo get_bloginfo('template_directory'); ?>/fav.ico">

<!-- Apple Touch Icons -->
<!-- https://github.com/audreyr/favicon-cheat-sheet -->
<!-- <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-152.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-144.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-120.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-72.png">
<link rel="apple-touch-icon" href="<?php echo get_bloginfo('template_directory'); ?>/img/apple-touch-icon-57.png"> -->

<!-- MS Homescreen Icons -->
<!-- <meta name="msapplication-TileColor" content="#0088cc">
<meta name="msapplication-TileImage" content="img/ms-touch-icon.png">
 -->

<?php wp_head(); ?>

<!-- Stylesheet -->
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/build/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/build/fonts/icons.css" type="text/css">

<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/vendor/flexslider/flexslider.css" type="text/css">

<!-- CDN Dependencies -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
 -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- TEMP CDN Dependencies -->
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/jquery-local.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/jqueryUI-local.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/build/js/underscore-local.js"></script>

<!-- Type Dependencies -->
<script src="//use.typekit.net/lgt3suf.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<link href="//cloud.webtype.com/css/f7ac8343-8a04-44d6-897e-9abc0a4dbf64.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim for IE 6-8 -->
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>

<!-- Old Browser Warning -->
<!--[if lt IE 9]>
  <section class="container">
    Did you know that your web browser is a bit old? Some of the content on this site might not work right as a result. <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, better, and safer web experience.
  </section>
<![endif]-->
<!--[if lt IE 9]>
  <section class="container">
    Did you know that your web browser is a bit old? Some of the content on this site might not work right as a result. <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, better, and safer web experience.
  </section>
<![endif]-->
<div class="jsdump" style="display:none;"></div>

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'crucial-detail' ); ?></a>

<div class="hfeed site container">
	<header id="masthead" class="site-header" role="banner">
		<nav class="topNav">
			<div class="productSidebarbutton">
				<span class="linkAlike productBarButton">
					<div class="productIconBlock"></div>
					<div class="productIconBlock"></div>
					<div class="productIconBlock"></div>
					<div class="productIconBlock"></div>
				</span>
			</div>
			<div class="thoughtbutton">
				<a href="
				<? $args = array( 'posts_per_page' => 1, 'post_type' => 'thoughts' );
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post );
				the_permalink();
				endforeach;
				wp_reset_postdata(); ?>">
					<i class="iconfont glyph-icon glyph_icon-idea"></i>
				</a>
			</div>
			<div class="homebutton">
				<a class="homebuttonLink" href="/">
					<i class="iconfont glyph-icon glyph_logo"></i>
					<i class="iconfont glyph-icon glyph_wordmark"></i>
				</a>
			</div>
			<div class="cartbutton">
				<a href="cart">
					<i class="iconfont fa fa-shopping-cart"></i>
				</a>
			</div>
			<div class="infobutton">
				<span class="linkAlike infoBarButton infoLink">
					<i class="iconfont fa fa-info-circle"></i>
				</span>
			</div>
		</nav>
	</header><!-- #masthead -->
</div>
<div class="hidder"></div>
<? get_template_part( 'productBar' ); ?>
<? get_template_part( 'progressBar' ); ?>
<? get_template_part( 'infoBar' ); ?>

<div id="page" class="hfeed site">
	<div id="content" class="site-content">
