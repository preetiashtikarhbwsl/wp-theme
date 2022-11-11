<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/wp-theme/portfolio-pagination.js"></script>
	
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
	<link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/wp-theme/lightbox.css">
	<script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/wp-theme/lightbox-plus-jquery.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-theme' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div class="search-container">
			<form class="search-bar" action="/action_page.php">
				<input type="text" class="search-bar-input" placeholder="Search.." name="search">
				<div class="submit__button">
				<button type="submit"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
	</header><!-- #masthead -->
	
