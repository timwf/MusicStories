<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

?>

<main id="site-content" role="main">

	<?php 
		$error_page_banner = get_field('error_page_banner', 'option');
	?>

	<div class="page-banner" <?php if($error_page_banner){ ?>style="background-image:url('<?php echo $error_page_banner; ?>"
	<?php }else{ ?>
		style="background-image:url('<?php echo get_template_directory_uri()?>/assets/images/ms-stories-bg.jpg"
	<?php } ?>>

	</div>
	<div class="section-inner thin error404-content">
		<section class="standard-editor page-content site-padding" data-aos="fade-up">
			<div class="page-content__container">
				<h1 class="entry-title">
					<?php _e( 'Sorry', 'twentytwenty' ); ?>
				</h1>
				<div class="description">
					<div class="sub-title">
						<p><?php _e( 'looks like we hit A wrong note.' ); ?></p>
					</div>
					<div class="intro-text">
						<p><?php _e( 'Error code 404. Please return to the home page.' ); ?></p>
					</div>
				</div>
				<div class="btn-section">
					<a href="<?php echo get_site_url(); ?>" class="btn">Home Page</a>
				</div>
			</div>
		</section>
	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
