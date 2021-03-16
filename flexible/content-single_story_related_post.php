<?php 
    $add_related_post = get_sub_field('add_related_post');
    $see_all_link = get_sub_field('see_all_link');

    $id = get_the_ID();
?>

<?php if($add_related_post == 1){ ?>

    <?php 
    //Get array of terms
    $terms = get_the_terms( $id , 'story_category', 'string'); 

    //quick and dirty - allows this flexible block to be used for Retailers cpt
    //TODO - tidy this up - make available for all taxonomies
    if($terms){
      $postType = 'story';
      $taxonomyName = 'story_category';
    }
    else{
      $terms = get_the_terms( $id , 'retailer_category', 'string'); 
      $postType = 'retailer';
      $taxonomyName = 'retailer_category';
    }

    //Pluck out the IDs to get an array of IDS
    $term_ids = wp_list_pluck($terms,'term_id');

    //Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
    //Chose 'AND' if you want to query for posts with all terms
    $second_query = new WP_Query( array(
        'post_type' => $postType,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomyName,
                'field' => 'id',
                'terms' => $term_ids,
                'operator'=> 'IN' //Or 'AND' or 'NOT IN'
            )),
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orderby' => 'ID',
        'order'   => 'ASC',
        'post__not_in'=>array($id)
    ) );

    //Loop through posts and display...
    if($second_query->have_posts()) { ?>
        <div class="s-grid">
            <?php while ($second_query->have_posts() ) { $second_query->the_post(); 
                $title = get_the_title();
                $post_link = get_the_permalink();
                $image = get_the_post_thumbnail_url();
                $short_description = get_field('short_description',$id); 
            ?>
                <div class="s-grid__item">
                    <div class="s-grid__card" data-aos="fade-up">
                        <img src="<?php echo $image; ?>" alt="featured-image">
                        <h4 class="content-card__heading"><?php echo $title; ?></h4>
                        <p><?php echo $short_description; ?></p>
                        <a href="<?php echo $post_link; ?>">
                            more
                        </a>
                    </div>
                </div>
            <?php } wp_reset_query(); ?>
        </div>
    <?php } ?>

    <?php if($see_all_link){
        $url = $see_all_link['url']; 
        $title = $see_all_link['title'];
        $target = ($see_all_link['target'] ? 'target=_blank' : '');
    ?>
        <div class="story-btn-bar">
            <a href="<?php echo $url; ?>" class="btn" <?php echo $target; ?>>
                SEE ALL
            </a>
        </div>
    <?php } ?>

<?php } ?>
