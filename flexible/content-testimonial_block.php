<?php 
    $content = get_sub_field('content');
    $written_by_text = get_sub_field('written_by_text');
?>


<section class="page-content page-content--testimonial site-padding " data-aos="fade-up">
    <div class="page-content__container">
        <?php echo $content; ?>
        <div class="word-by">
            <p><?php echo $written_by_text; ?></p>
        </div>
    </div>
</section>