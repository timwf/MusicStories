<?php 
    $image = get_sub_field('image');
?>

<?php if($image){ 
    $image_url = $image['url'];
    $image_alt = $image['alt'];
?>
    <section class="img-block site-padding " data-aos="fade-up">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </section>
<?php } ?>