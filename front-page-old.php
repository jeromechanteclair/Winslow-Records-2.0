<?php get_header(); ?>



<div class="container" style="">


<div class="row">
<!-- Left Content !-->
	<div class="col-md-7">
		<?php

		$args = array(


		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
		);
		$the_query = new  WP_Query ( $args );
		?>
				
		<div class="col-sm-12">
			<h1 class=" head mobilecenter ">A la une du label</h1><hr>
		</div>		
		<div class="col-sm-12 marginbottom "  >

			<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query ->the_post(); ?>
			<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">

			<div class="col-sm-12" id="thumbnailsticky" style="background-image: url('<?php echo $thumb['0'];?>');">
			</div>

		<div class=" col-sm-12" id="stickycaption">

		<h4><?php the_title(); ?></a></h4>
		<p><?php the_excerpt(); ?></p>
		<a id="" href="<?php the_permalink() ?>" class="btn  btn-sm " role="button">Lire la suite</a>

		</div>

		<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		</div>



		<?php
		$sticky = get_option('sticky_posts');
		$related = get_posts( array(
		 
		  'numberposts' => 2,
		
		   'post__not_in' => $sticky 
		   ) );
		if( $related ) foreach( $related as $post ) {
		setup_postdata($post); ?>
		<div class="" id="morenews">

			<div class="" >

				<a href="<?php the_permalink() ?>">
					<div class="col-sm-12 " id="" >
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						



						<div class="" id="" style="padding:0 20px 0  20px;">
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
		<a style="margin:5px 10px 0px 0px;font-weight: 600;" href=" <?php echo get_permalink( get_option( 'page_for_posts' ) );?>" class="btn btn-md pull-right " role="button">Toutes les nouvelles</a> <br class="hidden-xs">
		</div>
	</div>
<!-- Right Content !-->
	<div class="col-md-5">
		<div class="col-sm-12">
		<h3 class=" head mobile ">A l'écoute</h3><hr>


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
<div class="container-fluid section2">
<?php
while ( have_posts() ) : the_post();
get_template_part( 'releases-template');
endwhile;
?>
</div>
<div class="container">
<?php
while ( have_posts() ) : the_post();
get_template_part( 'artistes-template');
endwhile;
?>


</div>

<div>

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
echo '<div class="section2">
<div class="container" id="upcomingconcerts">
<h3 class="marginbottom">Concerts à venir</h3>';
endif

?>




<div class="">



<?php if (have_posts()) : while ($the_query->have_posts()) : $the_query ->the_post(); ?>



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

</div>
</div>


<?php get_footer(); ?>
