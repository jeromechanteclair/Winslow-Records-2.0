<?php

 /* Template Name: album
 Template Post Type: album */

 
get_header(); 
 

 
 

?>



<div class="container" style="">



	<div class="" id="">
	<div class="row">
	<div class="container">
	<div class="col-sm-12">
<table border="0" cellpadding="10" cellspacing="1" width="100%">
		 
					   <tr>
					      <td style="color: grey;"><span><h1>
				<?php the_title(); ?></h1></span> 

			 <span><p style="text-transform: uppercase;"><?php echo get_post_meta($post->ID, 'mytheme_artist', true); ?></p></span>	</td>
		<td style="text-align: right;">
				




		</td>
					    

					      
					   </tr>
					 
					   
					</table>	
</div>


		<div class="col-sm-5">





		<img style="max-width: 100%;" src="<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>">

<div class="col-sm-12" id="tablespecs" style="">
					
				<table border="0" cellpadding="10" cellspacing="1" width="100%">
		  
					   <tr>



<?php
$date = get_post_meta($post->ID, 'mytheme_datepicker', true);
 ;
 if ($date == '') {
		echo '';
		} else {
		echo '<td style=""><p style="font-weight: 600;">Sortie le</p></td>
		<td style="text-align: right;">'.date('d/m/Y', strtotime($date)).'</td>';
		}?>
					      
					      
					      
					   </tr>
					   <tr>


<?php
$linkstudio = get_post_meta($post->ID, 'mytheme_studio_link', true)
 ;
 if ($linkstudio == '') {
		echo '';
		} else {
		echo '<td style=""><p style="font-weight: 600;">Studio</p></td><td style="text-align: right;">'.($linkstudio).'</td>';
		}?>
					    
					      
					     
					   </tr>
					    <tr>

<?php
$mastering = get_post_meta($post->ID, 'mytheme_mastering_link', true)
 ;
 if ($mastering == '') {
		echo '';
		} else {
		echo '<td ><p style="font-weight: 600;">Mastering</p></td> 
		<td style="text-align: right;">'.($mastering).'</td>';
		}?>
					


					     
					     
					   </tr>
					</table>		
				</div>
					<br>

		
		</div>
		<div class="col-sm-7">
			<div class="row">
				
			</div>
			<div class="row" id="specs">
				<div class="col-sm-12" id="embedaudio">
				<?php echo get_post_meta($post->ID, 'mytheme_embed_audio', true); ?>

				</div>

				<div class="col-sm-12">

<?php
$description = get_post_meta($post->ID, 'mytheme_album_desc', true)
 ;
 if ($description == '') {
		echo '';
		} else {
		echo '<br><h4>Description</h4><p>
		'.$description.'</p>';
		}?>


					
				
				 
				</div>
				<div class="col-sm-12 ">

<?php $meta = get_post_meta( get_the_ID(), 'mytheme_bandcamp_link', true );
				if ($meta == '') {
				echo '&nbsp;';
				} else {
				echo '<a href="' . $meta . '"class="pull-left  " target="_blank"><i class="fa fa-custom  fa-bandcamp fa-2x"></i>&nbsp;</a>';
				}
				?>
				<?php $meta = get_post_meta( get_the_ID(), 'mytheme_spotify_link', true );
				if ($meta == '') {
				echo '&nbsp;';
				} else {
				echo '<a href="' . $meta . '"class="pull-left " target="_blank"><i class="fa fa-custom  fa-spotify fa-2x"></i>&nbsp;</a>';
				}
				?>
				<?php $meta = get_post_meta( get_the_ID(), 'mytheme_deezer_link', true );

				$deezericon = get_bloginfo('template_url').'/images/deezer.png';

				if ($meta == '') {
				echo '&nbsp;';
				} else {
				echo '<a href="' . $meta . '"class="pull-left " target="_blank"> <img class="fa-custom" src="'.$deezericon.'">

&nbsp;
				</a>';
				}
				?>
				<?php $meta = get_post_meta( get_the_ID(), 'mytheme_soundcloud_link', true );
				if ($meta == '') {
				echo '&nbsp;';
				} else {
				echo '<a href="' . $meta . '"class="pull-left" target="_blank"><i class="fa fa-custom  fa-soundcloud fa-2x"></i>&nbsp;</a>';
				}
				?>
				</div>
				
				
			</div>	</div>
</div>
		</div>	<br>
	</div>
</div>
		<div class="section2" style="">
		<div class="container">
		<div class="col-sm-12"><h3 class="center marginbottom"> Dernières sorties</h3></div>
			
						<?php

						$related = get_posts( array( 
							 'post_type' => 'album',
							 'posts_per_page' => '4',
				 'meta_key' => 'mytheme_datepicker',

    'orderby' => 'meta_value',
    'order' => 'DESC',
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
			if( $related ) foreach( $related as $post ) {
			setup_postdata($post); ?>


							
									<div class="col-sm-3 center" id="album" style="">

												<a href="<?php the_permalink() ?>"><div id="albumimg" style=" background-image:url('<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>') ">

											<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
										</div></a>
												
												<h5><?php echo get_post_meta($post->ID, 'mytheme_artist', true); ?></h5>
									      
									       
									        <a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									            </a><br><br>
									</div>
									   
									<?php }
									wp_reset_postdata(); ?>

			


				</div><br>
		</div>
		</div>





</div>
<?php get_footer(); ?>
 