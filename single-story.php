<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

?>

	<?php if( have_rows('flexible_content') ){
		while ( have_rows('flexible_content') ) : the_row(); 
			set_query_var('number_show', get_row_index() );
			get_template_part( 'flexible/content', get_row_layout() );
		endwhile; ?>
	<?php } ?>

<?php get_footer(); ?>
