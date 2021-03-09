<?php 
    $add_top_border = get_sub_field('add_top_border');
    $select_width = get_sub_field('select_width');
    $heading = get_sub_field('heading');
    $text = get_sub_field('text');
    $button_link = get_sub_field('button_link');
 ?>

<section class="site-padding<?php if($select_width == 'medium'){ ?> text-block__intro<?php }else{ ?> text-block<?php } ?><?php if($add_top_border == 1){ ?> border-top<?php } ?>" data-aos="fade-up">
    <div class="text-container">
        <?php if($heading){ ?>
            <h1 class="h2"><?php echo $heading; ?></h1>
        <?php } ?>

        <?php echo $text; ?>
        
        <?php if($button_link){
            $url = $button_link['url']; 
            $title = $button_link['title'];
            $target = ($button_link['target'] ? 'target=_blank' : '');
        ?>
            <div class="btn-sec">
                <a href="<?php echo $url; ?>" <?php echo $target; ?> class="btn">
                    <?php echo $title; ?>
                </a>
            </div>
        <?php } ?>
        
    </div>
</section>