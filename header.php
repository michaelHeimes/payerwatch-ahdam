<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
$color_theme = get_field('color_theme') ?? null;
$theme_brand = get_field('theme_brand', 'option') ?? null;
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('picked-color color-theme-' . $color_theme . ' brand-' . $theme_brand); ?>>
	<?php wp_body_open(); ?>
			<a class="skip-link screen-reader-text show-on-focus" href="#primary"><?php esc_html_e( 'Skip to content', 'trailhead' ); ?></a>
		
				<header class="site-header" role="banner">
					<div class="bg-wrap has-bg">
						<div class="bg"></div>
					</div>
					<?php get_template_part( 'template-parts/nav', 'offcanvas-topbar' ); ?>
				</header><!-- #masthead -->
				
				<div class="off-canvas-wrapper">
				
				<!-- Load off-canvas container. Feel free to remove if not using. -->			
				<?php get_template_part( 'template-parts/content', 'offcanvas' ); ?>
				
					<div class="off-canvas-content" data-off-canvas-content>
						<div id="page" class="site">
	