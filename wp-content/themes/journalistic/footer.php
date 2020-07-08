<?php
/**
 * The template for displaying the footer.
 *
 * Please browse readme.txt for credits and forking information
 * Contains the closing of the #content div and all content after
 *
 * @package journalistic
 */

?>

</div><!-- #content -->
<div class="footer-widget-wrapper">
	<div class="container">

		<div class="row">
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer_widget_left' ); ?> 
			</div>
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer_widget_middle' ); ?> 
			</div>
			<div class="col-md-4">
				<?php dynamic_sidebar( 'footer_widget_right' ); ?> 
			</div>
		</div>
	</div>
</div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="row site-info">

		<?php echo '&copy; '.date_i18n(__('Y','journalistic')); ?> <?php bloginfo( 'name' ); ?>
		<?php printf( __( '| Powered by ', 'journalistic' ) ); ?>
		<a href="<?php echo esc_url( __( 'https://outstandingthemes.com/', 'journalistic' ) ); ?>"><?php printf( __( 'Outstandingthemes', 'journalistic' ) ); ?></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
