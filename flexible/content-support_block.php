<?php 
    $title = get_sub_field('title');
    $title_color = get_sub_field('title_color');
?>
<section class="tf border-top bg__pink-light" data-aos="fade-up">
    <?php if( have_rows('left_content') ){ ?>
        <?php while ( have_rows('left_content') ) { the_row(); 
            $top_heading = get_sub_field('top_heading');
            $bottom_text = get_sub_field('bottom_text');
        ?>
            <div class="tf__item" data-aos="fade-up">
                <?php if($top_heading){ ?>
                    <div class="tf__item--heading site-padding">
                        <h2><?php echo $top_heading; ?></h2>
                    </div>
                <?php } ?>
                <?php if($bottom_text){ ?>
                    <div class="tf__item--copy site-padding border-top">
                        <?php echo $bottom_text; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>

    <?php if( have_rows('right_content') ){ ?>
        <?php while ( have_rows('right_content') ) { the_row(); 
            $image = get_sub_field('image');
        ?>
            <?php if($image){ 
                $image_url = $image['url'];
                $image_alt = $image['alt'];
            ?>
                <div class="tf__item tf__item--logo site-padding" data-aos="fade-up">
                    <img class="tflogo" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>

</section>