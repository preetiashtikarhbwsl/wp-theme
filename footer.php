<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="grid-container">
			  <div>
				<h2>Welcome to DESIGNfly</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id justo cursus, euismod elit ac, imperdiet dui. Pellentesque porttitor a nulla laoreet facilisis. Vestibulum a luctus lacus. Etiam suscipit eleifend dui eu semper.</p>
				<a href="#">Read More</a>
			</div>
			 <div>
			 <h2>Contact us</h2>
			 <p>Street 21 Planet,A-11, dapibus tristique. 123551</p>
			 <p>Tel: 123 4567890; Fax: 123 456789</p>
			 <p>Email:<span class="email">contactus@designfly.com</span></p>
			 <div>
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-google"></a>
				<a href="#" class="fa fa-linkedin"></a>
				<a href="#" class="fa fa-pinterest"></a>
			 </div>
			</div>   
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'wp-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'wp-theme' ), 'wp-theme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
