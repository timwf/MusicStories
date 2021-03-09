<?php 
    $add_top_border = get_sub_field('add_top_border');
    $select_story = get_sub_field('select_story');
?>

<section class="story-block border-top">
    <?php if( $select_story ){ ?>
        <?php foreach( $select_story as $post ){ 
            setup_postdata($post); 
            $id = get_the_ID();
            $title = get_the_title();
            $post_link = get_the_permalink();
            $image = get_the_post_thumbnail_url();
            $short_description = get_field('short_description',$id); 
        ?>
            <div class="story-block__item" data-aos="fade-up">
                <?php
					$terms = wp_get_post_terms( $post->ID, 'story_category');
                    $i=0;
					foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
				?>
					<h4 class="story-block__heading">
                        <?php echo $term->name; ?>
						<?php /*<a href="<?php echo get_term_link( $term ) ; ?>" class="tags__link">
							<?php echo $term->name; ?>
						</a> */ ?>
                    </h4>
				<?php 
                    $i++;
                    if($i==1) break;
                } ?>
                <div class="story-block__info site-padding">
                    <div class="content-card">
                        <img src="<?php echo $image; ?>" alt="featured-image">
                        <h4 class="content-card__heading"><?php echo $title; ?></h4>
                        <p><?php echo $short_description; ?></p>
                        <a href="<?php echo $post_link; ?>">
                            more
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php  wp_reset_postdata(); ?>
    <?php } ?>
</section>
