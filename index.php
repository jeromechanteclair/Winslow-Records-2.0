<?php get_header(); ?>

<div class="" style="">




     
      <div class="container" >
      <div class="">
        <div class="">
           <div class="col-sm-12">
                      <h1 class=" head mobile marginbottom" style=""> <?php the_title();?></h1>
                    </div>

            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
             
            <div class="col-sm-4" >
           
            
             
              <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                  <div class="" id="thumbnailblog" style="background-image: url('<?php echo $thumb['0'];?>');">
                
                  </div>
         
             <div class="col-sm-12" id="article" >

                <div class="col-sm-12" id="articlecontent" style="">
                   <table>
                    <tr>
                    <td style="color: grey; "><p class="datenews" style=""><?php the_date('d/m/Y'); ?></p></td>
                    <td id="tag"><p><?php the_tags( ''); ?></p></td>

                    </tr>
                       </table>   
                    <tr>
                    <td width="100%;">
                    <h5 class="nomargintop"><?php the_title(); ?></a></h5>
                    <p><?php the_excerpt(); ?></p><a href="<?php the_permalink() ?>" class="btn btn-mobile btn-sm" role="button">Lire la suite</a></td>
                           
                    

                    </tr>
                  
                  
                </div><br>

             </div>


            </div>
            
           
    		<?php endwhile; ?>  <?php endif; ?>
</div>
        </div>
  </div>
  </div>
</div> <p class="center" ><?php theme_pagination(); ?></p>
<br>
<!--?php get_sidebar(); ?!-->   
<?php get_footer(); ?>
