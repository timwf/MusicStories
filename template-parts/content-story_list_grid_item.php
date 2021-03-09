<?php
$id = get_the_ID();
$title = get_the_title();
$post_link = get_the_permalink();
$image = get_the_post_thumbnail_url();
$short_description = get_field('short_description', $id);
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