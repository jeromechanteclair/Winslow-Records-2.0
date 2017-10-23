<?php

 /* Template Name: Concert
 Template Post Type: event */

 
get_header(); 
 

 
 

?>


<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
<div class="row" id="hero" style="
background-image:url('<?php echo $thumbnail_url[0];?>') ">
	<div class=" eventhero" style="">
	<div class="container">
		<div class="col-sm-7 inverse "  >
<h3 class="inverse shadow" style="">
		 <?php 
			
		$date = get_post_meta($post->ID, 'mytheme_datepicker', true);
		echo date('d/m/Y', strtotime($date));
		# Output => '21.10.2011'
				 ?></h3>
		<h1 class="inverse shadow bold" ><?php the_title(); ?></h1>
		<h4 class="inverse shadow" >


				


	
		
		<?php echo  get_post_meta($post->ID, 'mytheme_input_location', true) ?>


</h4>
		<br>
		<a target="_blank" href="<?php echo get_post_meta($post->ID, 'mytheme_input_link', true); ?>" class="btn  btn-lg btntransparent " role="button" aria-pressed="true">Event Facebook</a>
		</div>
		<div class="col-sm-5 hidden-xs" id="poster" style="text-align: right;">
		<img src="<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>"><br>
		</div>
	</div>
</div>
</div>
<div class="container" style="">
	

<div class="row">
<div class="container" id="line-up">


	<?php
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	foreach ($repeatable_fields as $v) { ?>
		<div class="row">
			<div class="container">
				<div class="col-sm-6">
				<h3><?php echo $v['article_name'];?></h3>
				<p><?php echo $v['article_genre'];?></p>

				<p><?php echo $v['article_desc'];?></p>
				<hr>
				<?php 
		if ($v['article_facebook'] == '') {
		echo '';
		} else {
		echo '<a href="' . $v['article_facebook'] . '"class="" target="_blank"><i class=" fa fa-custom fa-facebook-official  fa-2x"></i></a>';
		}
		?>
		<?php 
		if ($v['article_link'] == '') {
		echo '&nbsp;';
		} else {
		echo '<a href="' . $v['article_link'] . '"class="" target="_blank"><i class="fa fa-custom fa-bandcamp  fa-2x"></i></a>';
		}
		?>

				
				</div>


				<div class="col-sm-6">
				<br>
				<p><?php echo $v['article_embed'];?></p>

				</div>
			</div>
		</div>
	<?php } ?> 

		
</div>
</div>
</div>
<div>

		<?php 
		$images = get_post_meta($post->ID, 'vdw_gallery_id', true);
		if ($images  == '') {
		echo '<div>';
		} else {
		echo '<div class=" section2" id="colgallery" "><div class="container" >
		
	
<div class="col-sm-12"><h3 class="center"> Gallerie</h3></div>';
		};?>

	

		<?php if( $images )foreach ($images as $image) {  setup_postdata($image); ?>


		

		<div class=" col-sm-2 my-gallery images-container" id="gallery" itemscope itemtype="http://schema.org/ImageGallery">
		  <?php 	$image_data = wp_get_attachment_image_src($image, 'full' );
		            $img = wp_get_attachment_image_src($image,'large');
		            $attachment_title = get_the_title($image);
		            if ($img && isset($img[0])):
		            ?>

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="<?php echo $img[0];?>" itemprop="contentUrl" data-size="<?php echo $image_width = $image_data[1]; ?>x<?php echo $image_height = $image_data[2]; ?>"">
      <div itemprop="thumbnail" alt="Image description" id="albumimg" style=" background-image:url('<?php echo $img[0];?>') ">

<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
                    </div>
          <img style="display: none;" src="<?php echo $img[0];?>"  />

      </a>
                                          <figcaption style="display: none;" itemprop="caption description"><?php echo $attachment_title;?></figcaption aria-hidden="true">
                                          
    </figure>

   <?php endif;?>

  </div>		



		<?php }
						wp_reset_postdata(); ?>


		</div><br>
			</div>
		
</div>





<div class="">
<?php
 $today = date("Y-m-d");
      $args = array(
       'post_type' => 'event',
				 

			"posts_per_page" => 4,
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
			);
			$the_query = new  WP_Query ( $args );
			?>


<?php 

if ($the_query->have_posts()) :
echo '<div class="container" id="upcomingconcerts"><h3 class="marginbottom">Concerts à venir</h3>';
endif

?>
			<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query ->the_post(); ?>
<div class="">

 



			<div class="col-sm-3" id="event" >


			<?php
			  $thumbnail_id = get_post_thumbnail_id();
			  $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
			   <a href="<?php the_permalink() ?>" >
			   <div class="row" id="heroevent" style="background-image:url('<?php echo $thumbnail_url[0];?>') "> 
				
				<br><span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
				<div id="caption" style="">
				<h4>
				<?php 

					$date = get_post_meta($post->ID, 'mytheme_datepicker', true);
					echo date('d/m/Y', strtotime($date));
					# Output => '21.10.2011'
		 ?>
	    </h4>
	       
			   <p> <?php the_title(); ?></p>
			   </div>
	            </span>
	     </div></a>


	

		</div>

		<?php endwhile; else : ?>
			<p>Youpi</p>
		<?php endif; ?>


</div>

</div>


</div>
<?php get_footer(); ?>
 