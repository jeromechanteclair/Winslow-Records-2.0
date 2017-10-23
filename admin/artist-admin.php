<?php

function mytheme_artist_metabox($post) {

   
    $artist_metabox = get_post_meta($post->ID);  

    $mytheme_artist_bio = ( isset( $artist_metabox['mytheme_artist_bio'][0] ) && '' !== $artist_metabox['mytheme_artist_bio'][0] ) ? $artist_metabox['mytheme_artist_bio'][0] : '';
     $mytheme_facebook_link = ( isset( $artist_metabox['mytheme_facebook_link'][0] ) && '' !== $artist_metabox['mytheme_facebook_link'][0] ) ? $artist_metabox['mytheme_facebook_link'][0] : '';
     $mytheme_bandcamp_link = ( isset( $artist_metabox['mytheme_bandcamp_link'][0] ) && '' !== $artist_metabox['mytheme_bandcamp_link'][0] ) ? $artist_metabox['mytheme_bandcamp_link'][0] : '';
     $mytheme_youtube_link = ( isset( $artist_metabox['mytheme_youtube_link'][0] ) && '' !== $artist_metabox['mytheme_youtube_link'][0] ) ? $artist_metabox['mytheme_youtube_link'][0] : '';
     $mytheme_tour_id = ( isset( $artist_metabox['mytheme_tour_id'][0] ) && '' !== $artist_metabox['mytheme_tour_id'][0] ) ? $artist_metabox['mytheme_tour_id'][0] : '';
     $mytheme_soundcloud_link = ( isset( $artist_metabox['mytheme_soundcloud_link'][0] ) && '' !== $artist_metabox['mytheme_soundcloud_link'][0] ) ? $artist_metabox['mytheme_soundcloud_link'][0] : '';
   $mytheme_artist_genre = ( isset( $artist_metabox['mytheme_artist_genre'][0] ) && '' !== $artist_metabox['mytheme_artist_genre'][0] ) ? $artist_metabox['mytheme_artist_genre'][0] : '';
    $mytheme_embed_audio = ( isset( $artist_metabox['mytheme_embed_audio'][0] ) && '' !== $artist_metabox['mytheme_embed_audio'][0] ) ? $artist_metabox['mytheme_embed_audio'][0] : '';
     $mytheme_embed_video = ( isset( $artist_metabox['mytheme_embed_video'][0] ) && '' !== $artist_metabox['mytheme_embed_video'][0] ) ? $artist_metabox['mytheme_embed_video'][0] : '';
     $mytheme_booking = ( isset( $artist_metabox['mytheme_booking'][0] ) && '' !== $artist_metabox['mytheme_booking'][0] ) ? $artist_metabox['mytheme_booking'][0] : '';
  

    wp_nonce_field( 'mytheme_artist_metabox_nonce', 'mytheme_artist_metabox_nonce' );
?>
   
    <style type="text/css">
   .uploaded_image{display: block; width: 100%;}
    .uploaded_image img{width: 200px;}
    .featured_image_upload{display: block; margin-bottom: 10px;}
    .table-left{display: inline-block;width: 50%;margin-right: 30px; vertical-align: top;}
    .table-right{display: inline-block;width: 40%; vertical-align: top;}
    label{display: block;margin-bottom: 5px;}
    .widefat{margin-bottom: 10px;}
    </style>

           
    <div id="infos">


    <div class="table-left">
             
                   
                
                 <p>
                    

                    <label> <?php esc_attr_e( 'Biographie', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_artist_bio"><?php echo esc_attr( $mytheme_artist_bio ); ?> </textarea>
                        
                   
                </p>

                 <p>
                    <label><?php esc_attr_e( 'Facebook Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_facebook_link" value="<?php echo esc_attr( $mytheme_facebook_link ); ?>">
                </p>
                 <p>
                    <label><?php esc_attr_e( 'Bandcamp Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_bandcamp_link" value="<?php echo esc_attr( $mytheme_bandcamp_link ); ?>">
                </p>
                 <p>
                    <label><?php esc_attr_e( 'Youtube Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_youtube_link" value="<?php echo esc_attr( $mytheme_youtube_link ); ?>">
                </p>
                <p>
                    <label><?php esc_attr_e( 'Soundcloud Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_booking" value="<?php echo esc_attr( $mytheme_booking ); ?>">
                </p>
               
               
               
               

          </div> 
          <div class="table-right">
                    
             <p><label><?php esc_attr_e( 'Genre', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_artist_genre" value="<?php echo esc_attr( $mytheme_artist_genre ); ?>">
                </p>
                <p>
                <label> <?php esc_attr_e( 'Embed Audio', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_embed_audio"><?php echo htmlspecialchars( $mytheme_embed_audio ); ?> </textarea>
                        </p>

                        <p>
                <label> <?php esc_attr_e( 'Embed Video', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_embed_video"><?php echo esc_attr( $mytheme_embed_video ); ?> </textarea>
                        </p> 
                         <p>
                    <label><?php esc_attr_e( 'Tour Id', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_tour_id" value="<?php echo esc_attr( $mytheme_tour_id ); ?>">
                </p>
 <p>
                    <label><?php esc_attr_e( 'Mail Booking', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_booking" value="<?php echo esc_attr( $mytheme_booking ); ?>">
                </p>
                </div> 

             
               </div>
           

    <?php
}
add_action('save_post', 'mytheme_artist_metabox_save');
function mytheme_artist_metabox_save($post_id) {
    if ( ! isset( $_POST['mytheme_artist_metabox_nonce'] ) ||
        ! wp_verify_nonce( $_POST['mytheme_artist_metabox_nonce'], 'mytheme_artist_metabox_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'artist_metabox', true);
    $new = array();
    
    
     if ( isset( $_POST['mytheme_artist_bio'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_artist_bio', sanitize_text_field( wp_unslash( $_POST['mytheme_artist_bio'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_facebook_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_facebook_link', sanitize_text_field( wp_unslash( $_POST['mytheme_facebook_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_bandcamp_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_bandcamp_link', sanitize_text_field( wp_unslash( $_POST['mytheme_bandcamp_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_youtube_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_youtube_link', sanitize_text_field( wp_unslash( $_POST['mytheme_youtube_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_tour_id'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_tour_id', sanitize_text_field( wp_unslash( $_POST['mytheme_tour_id'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_soundcloud_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_soundcloud_link', sanitize_text_field( wp_unslash( $_POST['mytheme_soundcloud_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_artist_genre'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_artist_genre', sanitize_text_field( wp_unslash( $_POST['mytheme_artist_genre'] ) ) ); // Input var okay.
        }
         if ( isset( $_POST['mytheme_booking'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_booking', sanitize_text_field( wp_unslash( $_POST['mytheme_booking'] ) ) ); // Input var okay.
        }


        if ( isset( $_POST['mytheme_embed_audio'] ) ) { // Input var okay.

 // WP's default allowed tags
        global $allowedtags;

        // allow iframe only in this instance
             $iframe = array( 'iframe' => array(
                            'src' => array (),
                            'width' => array (),
                            'height' => array (),
                            'frameborder' => array(),
                            'style'=> array(),
                            'allowFullScreen' => array() // add any other attributes you wish to allow
                             ) );

        $allowed_html = array_merge( $allowedtags, $iframe );

        // Sanitize user input.
        $my_data = wp_kses( $_POST['mytheme_embed_audio'], $allowed_html );

        //$my_data = $_POST['myplugin_new_text_area'];

        // Update the meta field in the database.
        update_post_meta( $post_id, 'mytheme_embed_audio', $my_data );


        }




        if ( isset( $_POST['mytheme_embed_video'] ) ) { // Input var okay.
             // WP's default allowed tags
        global $allowedtags;

        // allow iframe only in this instance
             $iframe = array( 'iframe' => array(
                            'src' => array (),
                            'width' => array (),
                            'height' => array (),
                            'frameborder' => array(),
                            'allowFullScreen' => array() // add any other attributes you wish to allow
                             ) );

        $allowed_html = array_merge( $allowedtags, $iframe );

        // Sanitize user input.
        $my_data = wp_kses( $_POST['mytheme_embed_video'], $allowed_html );

        //$my_data = $_POST['myplugin_new_text_area'];

        // Update the meta field in the database.
        update_post_meta( $post_id, 'mytheme_embed_video', $my_data );
        }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'artist_metabox', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'artist_metabox', $old );
}





?>