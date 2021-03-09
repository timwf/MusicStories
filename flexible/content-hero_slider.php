

        <div class="hero_sec" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
            <div class="hero">
                <?php if( have_rows('slide') ){ ?>
                    <?php while ( have_rows('slide') ) { the_row(); 
                        $background_image = get_sub_field('background_image');
                        $hero_image = get_sub_field('hero_image');
                        $heading = get_sub_field('heading');
                        $short_description = get_sub_field('short_description');
                        $link = get_sub_field('link');
                    ?>
                        <div class="hero__item" style="background-image:url('<?php echo $background_image; ?>">
                            <div class="hero__item__copy">
                                <?php if($hero_image){ 
                                    $hero_image_url = $hero_image['url'];
                                    $hero_image_alt = $hero_image['alt'];
                                ?>
                                <div class="hero__item__copy__img">
                                    <img src="<?php echo $hero_image_url; ?>" alt="<?php echo $hero_image_alt; ?>">
                                </div>
                                <?php } ?>

                                <div class="hero__item__copy__text">
                                    <?php if($heading || $short_description){ ?>
                                        <p>
                                            <?php if($heading){ ?>
                                                <strong><?php echo $heading; ?></strong>
                                            <?php } ?>
                                            <?php if($short_description){ ?>
                                                <?php echo $short_description; ?>
                                            <?php } ?>
                                        </p>
                                    <?php } ?>

                                    <?php if($link){
                                        $url = $link['url']; 
                                        $title = $link['title'];
                                        $target = ($link['target'] ? 'target=_blank' : '');
                                    ?>
                                        <div class="btn-sec">
                                            <a href="<?php echo $url; ?>" class="btn btn--white" <?php echo $target; ?>>
                                                <?php echo $title; ?>
                                            </a>
                                        </div>

                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
   