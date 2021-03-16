<?php 
    $select_post_meta_data = get_sub_field('select_post_meta_data');
    $content = get_sub_field('content');
    $meta_data = get_sub_field('meta_data');
?>

<section class="page-content site-padding border-top" data-aos="fade-up">
    <div class="page-content__container">
        
            <?php if($select_post_meta_data == 'default'){ ?>
                <h3>
                    <?php 
                        $id = get_the_ID();
                        $title = get_the_title();                        
                        $terms = wp_get_post_terms( $id, 'story_category'); 
                    ?>
                        <?php echo $title; ?><br/>
                    <?php 
                        foreach ( $terms as $term ) {
                            $cat_list[] = esc_html($term->name);
                        }
                    ?>
                    <?php 
                    if($cat_list){
                      $cat_str = implode(', ', $cat_list);
                      echo $cat_str; 
                    }
                    ?>
                </h3>
            <?php }elseif($select_post_meta_data == 'manual'){ ?>
                <h3>
                    <?php echo $meta_data; ?>
                </h3>
            <?php }else{ ?><?php } ?>
           
        <?php echo $content; ?>

    </div>
</section>