<?php 
    $add_main_heading = get_sub_field('add_main_heading');
    $heading = get_sub_field('heading');
    $sub_heading = get_sub_field('sub_heading');
    $content = get_sub_field('content');
    $top_space = get_sub_field('top_space');
    $bottom_space = get_sub_field('bottom_space');
?>

<section class="standard-editor page-content site-padding <?php if($top_space == 1): ?>top_space<?php endif; ?> <?php if($bottom_space == 1): ?>bottom_space<?php endif; ?>" data-aos="fade-up">
    <div class="page-content__container">
        <?php if($add_main_heading == 1){ ?>
            <?php if($heading){ ?>
                <h1>
                    <?php echo $heading; ?>
                </h1>
            <?php } ?>
        <?php } ?>
        <?php if($sub_heading){ ?>
            <h3>
                <?php echo $sub_heading; ?>
            </h3>
        <?php } ?>
            
        <?php echo $content; ?>

    </div>
</section>