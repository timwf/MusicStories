<?php

/**
 * 
 * Template Name: Story List
 * 
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();

?>

<?php if (have_rows('flexible_content')) {
	while (have_rows('flexible_content')) : the_row();
		if ((get_row_layout() == 'inner_page_banner_slider' || get_row_layout() == 'inner_page_banner_image')) {
			set_query_var('number_show', get_row_index());
			get_template_part('flexible/content', get_row_layout());
		}
	endwhile; ?>
<?php } ?>


<!------ Filter Category Start -------->

<?php get_template_part('template-parts/content', 'story-category-filter'); ?>

<!------ Filter Category End -------->


<?php
$args = array(
	'post_type' => 'story',
	'posts_per_page' => 6,
	'post_status' => 'publish'
);
$list = new WP_Query($args);
?>
<div class="s-grid storylist-grid">
	<?php if ($list->have_posts()) { ?>
		<?php while ($list->have_posts()) : $list->the_post();
			echo get_template_part('template-parts/content', 'story_list_grid_item');
		endwhile; ?>
	<?php } ?>
</div>

<div class="story-btn-bar">
	<a href="#" class="btn">SEE ALL</a>
</div>

<script>
	var ajax_call_url;
	var perpage = '6';
	var paged = 1;
	ajax_call_url = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
<?php get_footer(); ?>