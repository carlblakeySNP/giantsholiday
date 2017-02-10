<?php if ( !is_user_logged_in() ) { 
	//header("Location: http://www.attpark.com/");
}; ?>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Giants
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/build/img/favicon/white/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<script type="text/javascript" src="//use.typekit.net/czq2nci.js"></script>
<script type="text/javascript">try{Typekit.load({ async: true });}catch(e){}</script>

<link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

<!--gulpHeadStart edited by gulpfile.js--><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/build/css/style.min.css"><!--gulpHeadEnd-->


 <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.25.1/mapbox-gl.css' rel='stylesheet' />
    
<?php wp_head(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script>
<style>
    .scrolloff {
        pointer-events: none;
    }
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'giants' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/giants-enterprises-logo.svg" /></a>
		</div>
		<i class="hamburger"></i>
		<nav id="site-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
			<?php if(is_page('venues')) : ?>
			<div class="submenu-wrap">
				<ul class="submenu container">
					<li><a href="#venues">venue</a></li>
					<li><a href="#rates">rates</a></li>
					<li><a href="#policies">policies & procedures</a></li>
					<li><a href="#local-attractions">local attractions</a></li>
				</ul>
			</div>
			<?php endif; ?>
<!-- 			<?php if(is_page('about')) : ?>
			<div class="submenu-wrap">
				<ul class="submenu container">
					<li><a href="#about">about giants enterprises</a></li>
					<li><a href="#park">about at&t park</a></li>
					<li><a href="#directions">directions</a></li>
				</ul>
			</div>
			<?php endif; ?> -->
		</nav><!-- #site-navigation -->
	</header>

	<div id="content" class="site-content">
