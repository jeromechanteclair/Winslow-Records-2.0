

<div class="" id="ajaxtest">

	<div class="col-sm-3" id="event" >

	
	<?php
	          $thumbnail_id = get_post_thumbnail_id();
	          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
	           <a href="<?php the_permalink() ?>" >
	           <div class="row" id="heroevent" style="background-image:url('<?php echo $thumbnail_url[0];?>') "> 
				
				<br><span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
				<span id="caption" style="">
				<h4>
				



				<?php 
	
$date = get_post_meta($post->ID, 'mytheme_datepicker', true);
echo date('d/m/Y', strtotime($date));
# Output => '21.10.2011'
		 ?>

	    </h4>
	       
	   <p> <?php the_title(); ?></p></span>
	         </div></a>

</div>


