<?php get_header(); ?>

<?php
          $thumbnail_id = get_post_thumbnail_id();
          $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);?>
<main class="row" id="hero" style="background-color:#2C2D38;
;background-size:30%;padding-top: 1%; ">
<div class="col-sm-6" >
	<?php

						$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),
							 
							'post_type' => 'album',
							'posts_per_page' => '1',
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


							
									<div class=" center" id="" style="margin: 10%;">

												<a class="inverse" href="<?php the_permalink() ?>"><div id="albumimg" style=" background-image:url('<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>') ">

											<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
										</div></a>
												
												
									</div>
									   
									<?php }
									wp_reset_postdata(); ?>

</div>
<div class="col-sm-6">
<section style="margin:35%  30% 0 0%;">
<h1  class="inverse">Random Perspectives Out now !</h1>
<strong class="inverse"> Le nouvel album d'abraham murder est disponible en précommande à partir du 12 Janvier </strong>
<p>
	<br>
<button style="float: none!important;" class="btn btntransparent">ECOUTER L'ALBUM</button></p>
</section>
</div>
</main>
<div class=" section2" style="margin-top: -20px;">
	<div class="container">
<?php
while ( have_posts() ) : the_post();
get_template_part( 'artistes-template');
endwhile;
?>
</div>

</div>


<div class="container " style="
">


<div class="row">
<!-- Left Content !-->
	<div class="col-md-6">
		<?php

		$args = array(


		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
		);
		$the_query = new  WP_Query ( $args );
		?>
				
		<div class="col-sm-12">
			<h1 class=" head mobilecenter ">News</h1><br>
		</div>		
		<div class="col-sm-12 marginbottom "  >

			<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query ->the_post(); ?>
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">

			<div class="col-sm-5" id="thumbnailsticky" style="background-image: url('<?php echo $thumb['0'];?>');">
			</div>

		<div class=" col-sm-7" id="stickycaption">

		<h4><?php the_title(); ?></a></h4>
		<p><?php the_excerpt(); ?></p>
		<a id="" href="<?php the_permalink() ?>" class="btn  btn-sm " role="button"> Lire la suite </a>

		</div>

		<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		</div>



		<?php
		$sticky = get_option('sticky_posts');
		$related = get_posts( array(
		 
		  'numberposts' => 1,
		
		   'post__not_in' => $sticky 
		   ) );
		if( $related ) foreach( $related as $post ) {
		setup_postdata($post); ?>
		<div class="" id="morenews">

			<div class="" >

				<a href="<?php the_permalink() ?>">
					<div class="col-sm-12 " id="" >
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						



						<div class="" id="" style="">
						<table class="altnews">
						<tr>
						<td style="color: grey "><small class=""><?php the_date('d/m/Y'); ?>
						<span class="pull-right"><?php the_tags( ''); ?></span></small></td>

						</tr>
						<tr>
						<td><h5 class="nomargintop"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
						</td>
						<td></td>

						</tr>

						</table>    
						</div>
					

					</div> 
				</a>
			</div>
		</div>




		<?php }
		wp_reset_postdata(); ?>
		<div class="col-sm-12 pull-right">
		<a style="margin:5px 0px 0px 0px;font-weight: 600;" href=" <?php echo get_permalink( get_option( 'page_for_posts' ) );?>" class="btn btn-md pull-right " role="button">Toutes les nouvelles</a> <br class="hidden-xs">
		</div>
	</div>
<!-- Right Content !-->
	<div class="col-md-6">
		<div class="col-sm-12">
		<h3 class=" head mobile ">A l'écoute</h3><br>


			<div class="embed-responsive embed-responsive-1by1">
			<?php echo get_post_meta($post->ID, 'mytheme_embed_audio', true); ?>
			</div><br>
			<div class="embed-responsive embed-responsive-1by1">
			<?php echo get_post_meta($post->ID, 'mytheme_embed_video', true); ?>
			</div>

		</div>
	</div>
</div>

<br>
</div>
<div class="container-fluid ">
<?php
while ( have_posts() ) : the_post();
get_template_part( 'releases-template');
endwhile;
?>
</div>


<div>

<?php
$today = date("Y-m-d");
$args = array(
'post_type' => 'event',


"posts_per_page" => 2,
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
echo '<div class="" style="padding-bottom:20px;">
<div class="container" id="upcomingconcerts">
<h3 class="marginbottom"> Prochain Concert </h3>';
endif

?>




	

		<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query ->the_post(); ?>



<div class="col-md-12" style="background-color:white;border-bottom: 1px solid #d2d2d2!important;
	padding: 20px;margin-bottom: 20px;
;">





			<div class="col-md-5" id="event"  style="padding-left: 0px;">


			<?php
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true);
			?>
			<a href="<?php the_permalink() ?>" >
				<div class="row" id="heroevent" style="margin:0px;padding-top:60%;background-image:url('<?php echo $thumbnail_url[0];?>') "> 

				<br><span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
					<div id="caption" style="">
					

					
					</div>
				</span>
				</div>
			</a>

			</div>
			<div class="col-sm-7 " style="text-align: left;padding: 4% 5%;">
		<p>
					<?php 

					$date = get_post_meta($post->ID, 'mytheme_datepicker', true);
					echo date('d/m/Y', strtotime($date));
					# Output => '21.10.2011'
					?>
					</p><h4 class=""> <?php the_title(); ?></h4>
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> Café gallerie: 2 rue imbert collombes 69001 LYON</p>
					<p> Prix libre</p>
					<a id="" href="<?php the_permalink() ?>" class="btn  btn-sm " role="button">Voir l'événement</a>
	</div>
</div>

		<?php endwhile; else : ?>
	
		<?php endif; ?>



	</div>
	





</div>

</div>
</div>


<?php get_footer(); ?>
