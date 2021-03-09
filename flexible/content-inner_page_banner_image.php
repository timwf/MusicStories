
<?php 
    $images = get_sub_field('images');
?>

<div class="page-banner" <?php if($images){ ?>style="background-image:url('<?php echo $images; ?>"
<?php }else{ ?>
    style="background-image:url('<?php echo get_template_directory_uri()?>/assets/images/ms-stories-bg.jpg"
<?php } ?>>

</div>