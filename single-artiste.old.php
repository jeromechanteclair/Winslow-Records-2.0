<?php

 /* Template Name: artiste 
 Template Post Type: artiste */

 
get_header(); 
 

 
 

?>
<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>



<div class="">
<div class="container-fluid">
	<div class="col-sm-6" style="background-image:url('<?php echo $thumbnail_url[0];?>');height: 300px; ">





	</div>
	<div class="col-sm-6">
<h1 class=""> <?php the_title(); ?> &nbsp</h1>
					
						<div class="col-sm-12 marginbottom" style="">
			

				


						<p class="nomargin"><?php echo get_post_meta($post->ID, 'mytheme_artist_genre', true); ?></p>
							
						</div>
						
						<div class="col-sm-12 col-md-12 marginbottom" style="">
						

							<?php 

							$facebook= get_post_meta($post->ID, 'mytheme_facebook_link', true);

							if ($facebook == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $facebook . '"class="" target="_blank"><i class="fa fa-custom fa-facebook-official  fa-lg"></i></a>';
							}
							?>

							<?php 

							$bandcamp= get_post_meta($post->ID, 'mytheme_bandcamp_link', true);

							if ($facebook == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $bandcamp . '"class="" target="_blank"><i class="fa fa-bandcamp fa-custom   fa-lg"></i></a>';
							}
							?>
							<?php 

							$youtube= get_post_meta($post->ID, 'mytheme_youtube_link', true);

							if ($youtube == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $youtube . '"class="" target="_blank"><i class="fa fa-youtube-play fa-custom   fa-lg"></i></a>';
							}
							?>
							<?php 

							$soundcloud= get_post_meta($post->ID, 'mytheme_soundcloud_link', true);

							if ($soundcloud == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $youtube . '"class="" target="_blank"><i class="fa fa-soundcloud fa-custom  fa-lg"></i></a>';
							}
							?>



	</div>
</div>

</div>



          <div class="row" id="hero" style="background-image:url('<?php echo $thumbnail_url[0];?>') "> </div>
          




<div class="sticker marginbottom">
<div class="container">
		<div class="row " >
			<div class="col-sm-7"  > 
			
					
					<div class="col-sm-12 col-md-12" style="">
						<h1 class=""> <?php the_title(); ?> &nbsp</h1>
						</div>
						<div class="col-sm-12 marginbottom" style="">
			

				


						<p class="nomargin"><?php echo get_post_meta($post->ID, 'mytheme_artist_genre', true); ?></p>
							
						</div>
						
						<div class="col-sm-12 col-md-12 marginbottom" style="">
						

							<?php 

							$facebook= get_post_meta($post->ID, 'mytheme_facebook_link', true);

							if ($facebook == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $facebook . '"class="" target="_blank"><i class="fa fa-custom fa-facebook-official  fa-lg"></i></a>';
							}
							?>

							<?php 

							$bandcamp= get_post_meta($post->ID, 'mytheme_bandcamp_link', true);

							if ($facebook == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $bandcamp . '"class="" target="_blank"><i class="fa fa-bandcamp fa-custom   fa-lg"></i></a>';
							}
							?>
							<?php 

							$youtube= get_post_meta($post->ID, 'mytheme_youtube_link', true);

							if ($youtube == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $youtube . '"class="" target="_blank"><i class="fa fa-youtube-play fa-custom   fa-lg"></i></a>';
							}
							?>
							<?php 

							$soundcloud= get_post_meta($post->ID, 'mytheme_soundcloud_link', true);

							if ($soundcloud == '') {
							echo '&nbsp;';
							} else {
							echo '<a class="socialpull" href="' . $youtube . '"class="" target="_blank"><i class="fa fa-soundcloud fa-custom  fa-lg"></i></a>';
							}
							?>


						
						
						</div>
	
			 </div>
			<div class="col-sm-5 " id="playerartist" style="">  
			  
			  <div class="col-sm-12">
			  <?php echo get_post_meta($post->ID, 'mytheme_embed_audio', true); ?> 

			  </div>
			</div>


		</div>
			 

</div>
</div>
       





<div id="portfolio" class="container" > 

	<div class="row" id="contentartist">
		<div class="container">


			<div class="col-sm-7 lefthero " style="">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-12">
					<div class="row">
						<div class="container-fluid marginbottom section2" id="galcontent"><h4> Bio </h4>


						<p><?php echo get_post_meta($post->ID, 'mytheme_artist_bio', true); ?>
						</p> 
						</div>	

						<div class="embed-responsive embed-responsive-4by3">
						<?php echo get_post_meta($post->ID, 'mytheme_embed_video', true); ?>
						</div><br>
					</div>
				</div>
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			</div>

			<div class="col-sm-5" id="rightdesc" >
				<div class="">
					<?php
					while ( have_posts() ) : the_post();
					get_template_part( 'related-news-template');
					endwhile;
					?>
					<div class="row marginbottom " id="relatedalbums" >
					<div class="col-sm-12"><h4>Releases</h4> 	</div>		
									
					<?php

					$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),

					'post_type' => 'album',
					'post__not_in' => array($post->ID) ) );
					if( $related ) foreach( $related as $post ) {
					setup_postdata($post); ?>


					<a href="<?php the_permalink() ?>">
					<div class="col-sm-6 " style="text-align: center;" id="album">

						

					<div id="albumimg" style=" background-image:url('<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>') ">

					<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
					</div>
					<h5 class="center">
					<?php echo get_post_meta($post->ID, 'mytheme_artist', true); ?></h5>


					<a class="center nomargintop" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

					</div>
					</a>

					<?php }
					wp_reset_postdata(); ?>





					</div>
					
					
				</div>

			</div>
		</div>
		
	</div>

 		
</div>
<br>
<div class="container-fluid " id="tourdates" style="">


<div class="row">

<div class="container">

<div class="col-sm-8 mobilecenter"><h3 class="inverse mobile"> Concerts </h3> </div>
<div class="col-sm-4">
						<div class="card " style="background-color: transparent;
						text-align: right; border-bottom:0px solid white;margin-top: 20px;">

							<div class="card-block" >
<?php 

							$booking= get_post_meta($post->ID, 'mytheme_booking', true);

							if ($booking == '') {
							echo 'Booking infos : contact@winslowrecords.net';
							} else {echo 'Booking infos : ';
							  echo  get_post_meta($post->ID, 'mytheme_booking', true) ;
							}
							?>


							
							</div>
						</div>
</div>
<div class="col-sm-12">
	
						<!--?php
 $options = array('scope' => 'all', 'artist' => 1, 'limit' => 10, 'type'=>'monthly');
  echo gigpress_menu($options);

?!--> <br>

<?php

$tourid = get_post_meta($post->ID, 'mytheme_tour_id', true);

 $options = array('scope' => 'upcoming', 'artist' =>$tourid, 'limit' => 10, 'type'=>'monthly');

echo gigpress_shows($options);
 ?>



	</div>
</div></div>
<br>

</div>



 

</div>
 
</div>

<?php get_footer(); ?>