<?php 
    $title = get_sub_field('title');
    $title_color = get_sub_field('title_color');
?>


<section class="acc">
    <div class="acc__row">
        <div class="acc__card">
            <?php if($title){ ?>
                <div class="acc__title site-padding" data-aos="fade-up">
                    <h2 class="h1 color-<?php echo $title_color; ?>">
                        <?php echo $title; ?>
                    </h2>
                </div>
            <?php } ?>
            <?php if( have_rows('content_section') ){ ?>
                <?php while ( have_rows('content_section') ) { the_row(); 
                    $set_image = get_sub_field('set_image');
                    $select_background_color = get_sub_field('select_background_color');
                    $image = get_sub_field('image');
                ?>
                    <div class="acc__panel bg__<?php echo $select_background_color; ?>" data-aos="fade-up">
                        <div class="acc__panel__row">
                            <?php if($image){ 
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                            ?>
                                <div class="acc__panel__item acc__panel__item--img site-padding<?php if($set_image == 'left'){ ?> order-1<?php }else{ ?> order-2<?php } ?>" data-aos="fade-up" data-aos-delay="100">
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                                </div>
                            <?php } ?>
                            <?php if( have_rows('content_part') ){ ?>
                                <?php while ( have_rows('content_part') ) { the_row(); 
                                    $heading = get_sub_field('heading'); 
                                    $text = get_sub_field('text'); 
                                    $link = get_sub_field('link'); 
                                ?>
                                    <div class="acc__panel__item acc__panel__item--copy site-padding<?php if($set_image == 'left'){ ?> order-2<?php }else{ ?> order-1<?php } ?>" data-aos="fade-up" data-aos-delay="100">
                                        <div class="text-container">
                                            <?php if($heading){ ?>
                                                <h2><?php echo $heading; ?></h2>
                                            <?php } ?>
                                            
                                            <?php echo $text; ?>

                                            <?php if($link){
                                                $url = $link['url']; 
                                                $title = $link['title'];
                                                $target = ($link['target'] ? 'target=_blank' : '');
                                            ?>
                                                <div class="btn-sec">
                                                    <a href="<?php echo $url; ?>" <?php echo $target; ?> class="btn">
                                                        <?php echo $title; ?>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>