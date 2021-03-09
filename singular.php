<?php

/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if (have_rows('flexible_content')) :
		$fl = 0;
		while (have_rows('flexible_content')) : the_row();
			$fl++;
	?>
			<div class="sections section_<?php echo $fl; ?> <?php echo get_row_layout(); ?>_<?php echo $fl; ?>_scroll section-<?php echo get_row_layout(); ?> <?php if (get_sub_field('remove_top_padding')) : ?>pt-0<?php endif; ?> <?php if (get_sub_field('remove_bottom_padding')) : ?>pb-0<?php endif; ?>" id="<?php echo get_row_layout(); ?>_<?php echo $fl; ?>">
				<?php get_template_part('flexible/content', get_row_layout()); ?>
			</div>
	<?php endwhile;
	else :
		if (have_posts()) {

			while (have_posts()) {
				the_post();

				get_template_part('template-parts/content', get_post_type());
			}
		}
	endif;

	?>

</main><!-- #site-content -->


<?php get_footer(); ?>