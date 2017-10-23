<div class="row" id="news" style="margin-bottom: 10px;">
						<div class="col-sm-12">
												
											
							
							
							<?php

							$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
							$the_query = new  WP_Query ( $related );

?>

<?php 

if ($the_query->have_posts()) :
echo '<h4>Dernières nouvelles </h4> ';
endif

?>
<?php
							if( $related ) foreach( $related as $post ) {
							setup_postdata($post); ?>


								<div class="col-sm-12 news">
									<a href="<?php the_permalink() ?>">
										<div class="row altnews" id="article" style="" >
										<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
											



											<div class="" id="" style="padding-bottom: 0px!important;">
												<table>
												<tr>
												<td style="color: grey; "><small class=""><?php the_date('d/m/Y'); ?>
												<span class="pull-right"><?php the_tags( ''); ?></span></small></td>

												</tr>
												<tr>
												<td><h5 class="nomargintop"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>

												   </td>


												</tr>

												</table>    
											</div>



										</div> 
									</a>
								</div>



			            
											<?php }
											wp_reset_postdata(); ?>
							
							</div>
					</div>