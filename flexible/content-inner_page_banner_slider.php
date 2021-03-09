


<div class="slider_sec" data-aos="fade-zoom-in" data-aos-easing="ease-in-back">
    <div class="slider">
        <?php if( have_rows('slide') ){ ?>
            <?php while ( have_rows('slide') ) { the_row(); 
                $background_image = get_sub_field('background_image');
                $heading = get_sub_field('heading');
                $secondary_title = get_sub_field('secondary_title');
                $link = get_sub_field('link');
            ?>
                <div class="slider__item" style="background-image:url('<?php echo $background_image; ?>">
                    <div class="slider__item__copy site-padding">
                        <div class="slider__item__copy__text">
                            <?php if($heading){ ?>
                                <h1 class="h2 s-head"><?php echo $heading; ?></h1>
                            <?php } ?>
                            <?php if($secondary_title){ ?>
                                <h3><?php echo $secondary_title; ?></h3>
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
   