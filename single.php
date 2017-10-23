<?php get_header(); ?>


<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
          <div class="row single" id="hero" style="background-image:url('<?php echo $thumbnail_url[0];?>') ">
              
        <div class="" id="newstitle" style="" >

        <h1 class="inverse shadow"><?php the_title(); ?></h1>
       
        </div>

          </div>


 <div class="container">
    <div id="blog" style="">
    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="row">
       
            <div class="entry">  
            <div class="container"> 
            <div class="col-sm-12">
            <br> <p id="tag" style=""><?php the_tags( ''); ?></p>
                <small><?php the_date('d/m/Y'); ?></small><p class="postmetadata">
                
                <?php edit_post_link("Editer l'article", ' &#124; ', ''); ?>
                </p>
                <?php the_content(); ?>

<br>
                <div class="navigation">  
    
      <?php previous_post_link('%link', ' <button type="button" class="btn btnmobile  btn-md "><i class="fa fa-arrow-left" aria-hidden="true"></i> Article précédent</button>
') ?>  
       <?php next_post_link('%link', '<button type="button" class="btn btnmobile   btn-md pull-right"> Article suivant <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  ') ?>  

      </div>
    </div></div>
 
               <br>
 



            </div>
 
            
    </div>
 
<?php endwhile; ?>
     
    
 
<?php endif; ?>
</div>
</div>
 
<!--?php get_sidebar(); ?!-->   
<?php get_footer(); ?>
