<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-12 marginbottom"><h3 class="center nomarginbottom" >Artistes Winslow</h3>
			</div>
			<?php
			 
			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID),
				 
				 'post_type' => 'artiste',
				 'orderby'=>'title','order'=>'ASC',
				  'post__not_in' => array($post->ID) ) );
			if( $related ) foreach( $related as $post ) {
			setup_postdata($post); ?>


				
			<div class="col-sm-3" id="">
				<?php  $thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id,'thumbnail-size',true); ?>
				<a href="<?php the_permalink() ?>" >		
			 		<div class="wrapper">
			            <div class="row" id="heroartist" style="background-image:url('<?php echo $thumbnail_url[0];?>') "> 
						
						
							<span class="overlay" style="text-decoration: none!important;">
							<h5>
							<?php the_title(); ?>
				    		</h5>
				       
				  			</span>
			            </div>
		            <br>
					</div>
				</a>
			</div>
						   
						<?php }
						wp_reset_postdata(); ?>


		</div>
	</div>