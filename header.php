<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
				
		<div class="header-wrapp nav-down">
			<header class="header notSticky" data-aos="fade-down" data-aos-easing="ease-in-back" data-aos-delay="100" data-aos-offset="0">
				<div class="header__logo">
					<?php $logo = get_field('logo', 'option'); ?>
					<a href="<?php echo get_site_url(); ?>">
						<?php if ($logo) { ?>
								<img src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo('name'); ?>" />
						<?php } ?>
					</a>
				</div>
				<div class="header__nav-btn">
					<a class="navbtn" href="javascript:void(0);">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
			</header>

			<?php 
				$select_menu_hover_color = get_field('select_menu_hover_color');
				if($select_menu_hover_color == 'teal'){
					$hover_class = 'hover-teal';
				}else{
					$hover_class = 'hover-pink';
				}
			?>
			<nav class="site-nav site-padding notSticky <?php echo $hover_class; ?>" data-aos="fade-down" data-aos-easing="ease-in-back" data-aos-delay="100" data-aos-offset="0">
				
				<?php
					wp_nav_menu(array(
						'theme_location'    => 'primaryleft',
						'menu_id'         => false,
						'depth'           => 2,
					));
				?>
				<?php
					wp_nav_menu(array(
						'theme_location'    => 'primaryright',
						'menu_id'         => false,
						'depth'           => 2,
					));
				?>

			</nav>
		</div>


		<?php
		// Output the menu modal.
		//get_template_part( 'template-parts/modal-menu' );
