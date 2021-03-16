<?php  
  $product = $template_args['product'];
  isset($template_args['this_seller']) ? $this_seller = $template_args['this_seller'] : $this_seller = true;
  $seller = get_post_field( 'post_author', $product->get_id());          
  $author  = get_user_by( 'id', $seller ); 
  isset($author->nickname) ? $sellerName = $author->nickname : $sellerName =  "no nickname!";    
?>

<?php 
  if($seller == $this_seller){?>
  <div class="s-grid__item">
  <div class="s-grid__card" data-aos="fade-up">
    <div class="s-grid__img-container">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
      <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
    </div>
    <h4 class="content-card__heading"><?php echo $sellerName ?></h4>
    <h4 class="content-card__heading"><?php echo the_title() ?></h4>      
    <p><?php echo the_excerpt();; ?></p>
    <a href="<?php echo the_permalink() ?>">more</a>
  </div>
</div>
<?php
  }
?>