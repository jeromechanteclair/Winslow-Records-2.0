<?php

 /* Template Name: About
 Template Post Type: page */

 
get_header(); 
 

 
 

?>

	<br>
	<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
          <div class="" > 
          
					<div id="hero"  class="container-fluid blog" style="background-image:url('<?php echo $thumbnail_url[0];?>'); ">
					<div class="">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="container" style="" id="content" ><br>
					<br>
					<div class="row" id="aboutcontent" >
					<h1 class="mobile center inverse" style=""> A Propos</h1>
					<p ><?php the_content(); ?></p></div>

					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
					</div>
					</div>
					</div>


          </div>

<div class="container-fluid" id="form" style="" >
	<div class="container" id="contact" style="" >

	
		

		<div class="form-area" style="">  
		
	<h4 class="center"> Laissez un message</h4>
	<br>
	
	
<?php echo do_shortcode('[sitepoint_contact_form]'); ?></div></div><br>

</div>

<?php get_footer(); ?>