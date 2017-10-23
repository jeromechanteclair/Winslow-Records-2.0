<?php

 /* Template Name: page gallerie
 Template Post Type: page */

 
get_header(); 
 

 
 

?>
<div >



  <div class="container"> 
  <div class="row">
  <div class="col-sm-12">
  <div class="col-sm-12"> <h1  class=" head mobile center"><?php the_title()?></h1><br></div>
      <?php

      $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),
         
         'post_type' => 'gallerie',
         
    'order' => 'DESC',
    
          'post__not_in' => array($post->ID) ) );
      if( $related ) foreach( $related as $post ) {
      setup_postdata($post); ?>


        
            <div class="col-sm-3 center" id="album" >
<?php  $thumbnail_id = get_post_thumbnail_id();
        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);
?>
                  <a href="<?php the_permalink() ?>"><div id="albumimg" style=" background-image:url('<?php echo $thumbnail_url[0];?>') ">

<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
                    </div></a>
                  
                  
                  
                   <h5>
                    <a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                        </a><br><br>
            </div>
               
            <?php }
            wp_reset_postdata(); ?>


            
  </div>
  </div>      
          

</div></div>

<?php get_footer(); ?>