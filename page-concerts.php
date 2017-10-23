<?php
/**


Template Name: gigs
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

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
<h3 class="marginbottom" style="text-align:left;"> Prochains Concerts </h3>';
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
					<p> <i class="fa fa-map-marker" aria-hidden="true"></i> Café gallerie: 2 rue imbert collombes 69001 LYON</p>
					<p> Prix libre</p>
					<a id="" href="<?php the_permalink() ?>" class="btn  btn-sm " role="button">Voir l'événement</a>
	</div>
</div>

		<?php endwhile; else : ?>
	
		<?php endif; ?>



	</div>
	





</div>

</div>

<!-- COncerts passés-->
<div class="col-sm-12 section2" style="background-color:#F2F2F2;">
	


<?php
$today = date("Y-m-d");
$args = array(
'post_type' => 'event',


"posts_per_page" => 24,
'meta_key' => 'mytheme_datepicker',

'orderby' => 'meta_value',
'order' => 'ASC',
'meta_query'=> array(
array(
'key' => 'mytheme_datepicker',
'meta-value' => $value,
'value' => $today,
'compare' => '<=',
'type' => 'CHAR'// you can change it to datetime
)
),
);
$the_query = new  WP_Query ( $args );
?>
<?php 

if ($the_query->have_posts()) :
echo '<div class="">
<div class="container" id="upcomingconcerts">
<h3 class="marginbottom">Concerts passés</h3>';
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


</div></div>
	</div>

</div><!-- .wrap -->

<?php get_footer();
