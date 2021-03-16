<?php

/**
 * 
 * Template Name: Stroy New
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
		if ((get_row_layout() == 'inner_page_banner_image' || get_row_layout() == 'inner_page_banner_slider')) {
			set_query_var('number_show', get_row_index());
			get_template_part('flexible/content', get_row_layout());
		}
	endwhile; ?>
<?php } ?>

<!------ Filter Category Start -------->

<?php //get_template_part('template-parts/content', 'story-category-filter'); ?>

<!------ Filter Category End -------->

<?php
$login_text_and_link = get_field('login_text_and_link');

if ($login_text_and_link) {
?>

	<div class="block-intro-text site-padding border-top">
		<div class="block-intro-text__inner">
			<?php echo $login_text_and_link; ?>
		</div>
	</div>
<?php } ?>


<?php
$args = array(
	'post_type' => 'story',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);
$list = new WP_Query($args);
?>

<div class="storylist-grid_with_loadmore">
	<div class="s-grid storylist-grid">


  <?php 
      $args = array(
          'posts_per_page' => '-1',
          'product_cat' => 'profile',
          'post_type' => 'product',
          'order'      => 'ASC'
      );
        $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) {
          $loop->the_post();         
          ?>

        <?php _get_template_part('/template-parts/product-grid', ['product' => $product]); ?>
        
      <?php }?>
	</div>
</div>

<?php get_footer(); ?>