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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="">
		<div class="container">
<div class="">
<div class="col-sm-12 mobile ">
<h3 style=""><?php the_title() ?></h3><br></div>

			<div class="col-md-8">
			<form id="misha_filters" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST">
				<label for="misha_posts_per_page"></label>
				<select name="misha_posts_per_page" id="misha_posts_per_page">
				<option value="-1">Tout</option>
					<option>8</option><!-- default value from Settings->Reading -->
					<option>12</option>
					
					
				</select>
				
				<label for="misha_order_by"></label>
				<select name="misha_order_by" id="misha_order_by">
				<option value=">=-ASC">Concerts à venir</option>
					<option value="<=-DESC">Concerts passés</option><!-- I will explode these values by "-" symbol later -->
					
					
				</select>
				
				<!-- required hidden field for admin-ajax.php -->
				<input type="hidden" name="action" value="mishafilter" />
				
				<button>ok</button>
			</form>
			</div><br class="visible-xs">
					<div class="col-sm-4">
						<div class="card">

							<div class="card-block">
							Booking infos : contact@winslowrecords.net
							</div>
						</div>
					</div> 
					<div class="col-sm-12">  <br>	</div>
				</div>
				</div>

				
			<?php
			if ( have_posts() ) :
				?>
			<div class="container">
			<div class="">

				<div id="misha_posts_wrap" class="" style="">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						get_template_part( 'eventdefault', get_post_format() );

					endwhile;
					?>
					
				</div>
				</div></div>
				<?php

				global $wp_query; // you can remove this line if everything works for you
 
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 ) :
					echo '<div id="misha_loadmore">More posts</div>'; // you can use <a> as well
				endif;

				else:

					get_template_part( 'eventdefault', 'none' );

				endif;
				?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
</div><!-- .wrap -->

<?php get_footer();
