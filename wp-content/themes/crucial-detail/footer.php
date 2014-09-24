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

	<footer id="colophon" class="site-footer container" role="contentinfo">
		<section class="footer">

		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Javascript -->
<!-- In the footer for better performance -->
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
