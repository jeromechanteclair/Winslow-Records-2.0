<?php

 /* Template Name: gallerie
 Template Post Type: gallerie */

 
get_header(); 
 

 
 

?>










<div class="container" id="colgallery" style="">
<div class="col-sm-12"> <h1 class="head marginbottom" style=""> <?php the_title( );?></h1> </div>
<div class="col-sm-3  ">
<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>


          
<div class="col-sm-12" id="herogallerie" style="
background-image:url('<?php echo $thumbnail_url[0];?>') "></div>
<div class="col-sm-12 section2" id="galcontent" style="margin-bottom: 20px;">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <p ><?php the_content(); ?></p>
    <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>


</div>
 </div>
  <div class="col-sm-9 nopadding" id="gallery">
    <?php 
      $images = get_post_meta($post->ID, 'vdw_gallery_id', true);
      if ($images  == '') {
      echo '&nbsp;';
      } else {
      echo '';
      }

      if( $images )foreach ($images as $image) {  setup_postdata($image); ?>


    

    <div class=" col-sm-3 my-gallery images-container" id="" itemscope itemtype="http://schema.org/ImageGallery">
          <?php 
          $image_data = wp_get_attachment_image_src($image, 'full' );
          $img = wp_get_attachment_image_src($image,'large');
          $attachment_title = get_the_title($image);
          if ($img && isset($img[0])):
          ?>
        <div class="item">
          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
          <a href="<?php echo $img[0];?>" itemprop="contentUrl" data-size="<?php echo $image_width = $image_data[1]; ?>x<?php echo $image_height = $image_data[2]; ?>">
              <div itemprop="thumbnail" alt="Image description" id="albumimg" style=" background-image:url('<?php echo $img[0];?>') ">

              <span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true">
                
              </i><br><p class="inverse"><?php echo $attachment_title;?></p></span>
              </div>
          <img style="display: none;" src="<?php echo $img[0];?>"  />

          </a>
          <figcaption style="display: none;" itemprop="caption description"><?php echo $attachment_title;?></figcaption aria-hidden="true"> 

          </figure>

          <?php endif;?>
        </div><br>
    </div>    
    <?php }
          wp_reset_postdata(); ?>


    </div>
  </div>





	<div class="" >
	<div class="">
	

	 <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<!--?php the_content(); ?!-->
	
<?php endwhile; ?>
     
    
 
<?php endif; ?>
</div>
	</div>
</div>	







<?php get_footer(); ?>
 