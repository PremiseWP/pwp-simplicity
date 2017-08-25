<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PWP_Simplicity
 */



?>

	</div><!-- #content -->

	<div class="pwp-clear-float"></div>

	<footer id="colophon" class="site-footer pwp-clear-float">
		<div class="site-content">
			<?php
			if ( is_active_sidebar( 'pwp-simplicity-footer-widgets' ) ) : ?>
				<div class="pwp-simplicity-footer-widgets pwp-clear-float pwp-row" style="display: none;">
					<?php dynamic_sidebar( 'pwp-simplicity-footer-widgets' ); ?>
				</div>
			<?php
			endif; ?>

			<div class="site-info pwp-clear-float pwp-align-center">
				<p class="site-info-copyright">Copyright &copy; <?php echo date( 'Y' ); ?>. All Rights Reserved.</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
