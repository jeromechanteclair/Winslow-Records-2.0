<div class="row section2" >
	<div class="container">
			
				<div class="col-sm-12 marginbottom"><h3  class="center nomarginbottom">Dernières sorties</h3>
				</div>
							<?php

							$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),

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



							<div class="col-sm-3 center" id="album" >

							<a href="<?php the_permalink() ?>"><div id="albumimg" style=" background-image:url('<?php echo get_post_meta($post->ID, 'mytheme_featured_image', true); ?>') ">

							<span  class="overlay"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></span>
							</div></a>

							<h5><?php echo get_post_meta($post->ID, 'mytheme_artist', true); ?></h5>


							<a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</a><br><br>
							</div>

							<?php }
							wp_reset_postdata(); ?>

			
	</div>
</div>