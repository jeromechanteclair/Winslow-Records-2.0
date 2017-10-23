
	<div class="row">
	<div class="col-sm-12">
			<?php
				$today = date("Y-m-d");

				$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),

				'post_type' => 'event',


				"posts_per_page" => 8,
				'meta_key' => 'mytheme_datepicker',

				'orderby' => 'meta_value',
				'order' => 'ASC',
				'meta_query'=> array(
				array(
				'key' => 'mytheme_datepicker',
				'meta-value' => $value,
				'value' => $today,
				'compare' => '>=',
				'type' => 'CHAR'// you can change it to datetime
				)
				),




				  'post__not_in' => array($post->ID) ) );
		
			if( $related ) foreach( $related as $post ) 

			 {
			setup_postdata($post); ?>


				
						<div class="col-sm-3" id="event">

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
						   
						<?php }
						 else {
		echo '<div class="container"><p>Pas de concerts à venir</p></div>';
		}
						wp_reset_postdata(); ?>


						</div></div>

	