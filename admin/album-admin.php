<?php


if ( ! function_exists( 'mytheme_metabox_controls' ) ) {
    /**
     * Meta box render function
     *
     * @param  object $post Post object.
     * @since  1.0.0
     */


    function mytheme_metabox_controls( $post ) {
        $meta = get_post_meta( $post->ID );

     $args_pages = array(

                        'depth'                 => 0,
    'child_of'              => 0,
    'selected'              => $mytheme_page_select,
    'echo'                  => 1,
    'name'                  => 'mytheme_page_select',
    'id'                    => 'mytheme_page_select',
    'class'                 => null,
    'show_option_none'      => null,
    'show_option_no_change' => null,
    'option_none_value'     => esc_html__( '&ndash; Select &ndash;', 'mytheme' ),
    'post_type' => 'artiste',

 
);

        
        $mytheme_album_desc = ( isset( $meta['mytheme_album_desc'][0] ) && '' !== $meta['mytheme_album_desc'][0] ) ? $meta['mytheme_album_desc'][0] : '';
         $mytheme_bandcamp_link = ( isset( $meta['mytheme_bandcamp_link'][0] ) && '' !== $meta['mytheme_bandcamp_link'][0] ) ? $meta['mytheme_bandcamp_link'][0] : '';
         $mytheme_spotify_link = ( isset( $meta['mytheme_spotify_link'][0] ) && '' !== $meta['mytheme_spotify_link'][0] ) ? $meta['mytheme_spotify_link'][0] : '';
         $mytheme_soundcloud_link = ( isset( $meta['mytheme_soundcloud_link'][0] ) && '' !== $meta['mytheme_soundcloud_link'][0] ) ? $meta['mytheme_soundcloud_link'][0] : '';
         $mytheme_deezer_link = ( isset( $meta['mytheme_deezer_link'][0] ) && '' !== $meta['mytheme_deezer_link'][0] ) ? $meta['mytheme_deezer_link'][0] : '';
         $mytheme_studio_link = ( isset( $meta['mytheme_studio_link'][0] ) && '' !== $meta['mytheme_studio_link'][0] ) ? $meta['mytheme_studio_link'][0] : '';
         $mytheme_mastering_link = ( isset( $meta['mytheme_mastering_link'][0] ) && '' !== $meta['mytheme_mastering_link'][0] ) ? $meta['mytheme_mastering_link'][0] : '';
         $mytheme_embed_audio = ( isset( $meta['mytheme_embed_audio'][0] ) && '' !== $meta['mytheme_embed_audio'][0] ) ? $meta['mytheme_embed_audio'][0] : '';
       $mytheme_artist = ( isset( $meta['mytheme_artist'][0] ) && '' !== $meta['mytheme_artist'][0] ) ? $meta['mytheme_artist'][0] : '';
        
        $mytheme_page_select = ( isset( $meta['mytheme_page_select'][0] ) && '' !== $meta['mytheme_page_select'][0] ) ? $meta['mytheme_page_select'][0] : '';
        
        $mytheme_datepicker = ( isset( $meta['mytheme_datepicker'][0] ) && '' !== $meta['mytheme_datepicker'][0] ) ? $meta['mytheme_datepicker'][0] : '';
        
        $mytheme_featured_image = ( isset( $meta['mytheme_featured_image'][0] ) ) ? $meta['mytheme_featured_image'][0] : '';
        

        wp_nonce_field( 'mytheme_control_meta_box', 'mytheme_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
        ?>

        <style type="text/css">

            
            .post_meta_extras p{margin: 20px;}
            .post_meta_extras label{display:block; margin-bottom: 10px;}
            .post_meta_extras .left_part{display: inline-block;width: 45%;margin-right: 30px; vertical-align: top;}
            .post_meta_extras .right_part{display: inline-block; width: 46%; vertical-align: top;}
            .uploaded_image{display: block; width: 200px;}
            .uploaded_image img{width: 200px;}
            .featured_image_upload{display: block; margin-bottom: 10px;}
            .post_meta_extras .gallery_buttons input{position: relative; display: inline-block; vertical-align: top; width: auto;}
            .post_meta_extras .title{font-size: 14px; padding: 8px 12px 8px 0; margin: 0; line-height: 1.4; font-weight: 600;}
            .post_meta_extras .gallery-item{position: relative; display: inline-block; vertical-align: top; margin-right: 10px; margin-bottom: 10px;}
            .post_meta_extras .gallery-item img{width: 200px; display: inline-block; vertical-align: top;}
            .post_meta_extras .gallery-item .remove{position: absolute; top: 5px; right: 5px; width: 20px; height: 20px; background: #000; border-radius: 50%; border: 1px solid #fff; color: #fff; text-align: center; font-weight: 600;
            line-height: 18px; cursor: pointer; display: none;}
            .post_meta_extras .gallery-item:hover .remove{display: block;}
        </style>

        <div class="post_meta_extras">
            <div class="left_part">


                 <p>
                   
                    <p>
                    <label><?php esc_attr_e( 'Artiste', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_artist" value="<?php echo esc_attr( $mytheme_artist ); ?>">
                </p>
                
                </p>

                <p>
                    

                    <label> <?php esc_attr_e( 'Description', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_album_desc"><?php echo esc_attr( $mytheme_album_desc ); ?> </textarea>
                        
                   
                </p>
                <p>
                    <label for="mytheme_featured_image"><?php esc_html_e( 'Album Cover', 'mytheme' ); ?></label>
                    <span class="uploaded_image">
                    <?php if ( '' !== $mytheme_featured_image ) : ?>
                        <img src="<?php echo esc_url( $mytheme_featured_image ); ?>" />
                    <?php endif; ?>
                    </span>
                    <input type="text" name="mytheme_featured_image" value="<?php echo esc_url( $mytheme_featured_image ); ?>" class="featured_image_upload">
                    <input type="button" name="image_upload" value="<?php esc_html_e( 'Upload Image', 'mytheme' ); ?>" class="button upload_image_button">
                    <input type="button" name="remove_image_upload" value="<?php esc_html_e( 'Remove Image', 'mytheme' ); ?>" class="button remove_image_button">
                </p>
              
                
               

               
                
            </div>
            <div class="right_part">
            <p>
                    <label for="mytheme_datepicker">
                        <?php esc_html_e( 'Date de sortie', 'mytheme' ); ?>
                    </label>
                    <input type="text" id="mytheme_datepicker" name="mytheme_datepicker" value="<?php echo esc_attr( $mytheme_datepicker ); ?>" />
                </p>
                <p>
                    <label><?php esc_attr_e( 'Bandcamp Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_bandcamp_link" value="<?php echo esc_attr( $mytheme_bandcamp_link ); ?>">
                </p>
                  <p>
                    <label><?php esc_attr_e( 'Spotify Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_spotify_link" value="<?php echo esc_attr( $mytheme_spotify_link ); ?>">
                </p>
                 <p>
                    <label><?php esc_attr_e( 'Deezer Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_deezer_link" value="<?php echo esc_attr( $mytheme_deezer_link); ?>">
                </p>
                 <p>
                    <label><?php esc_attr_e( 'Soundcloud Link', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_soundcloud_link" value="<?php echo esc_attr( $mytheme_soundcloud_link); ?>">
                </p>
                
                

                
                 <p>
                    <label><?php esc_attr_e( 'Studio', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_studio_link" value="<?php echo esc_attr( $mytheme_studio_link ); ?>">
                </p>
                 <p>
                    <label><?php esc_attr_e( 'Mastering', 'mytheme' ); ?></label>
                    <input class="widefat" type="text" name="mytheme_mastering_link" value="<?php echo esc_attr( $mytheme_mastering_link ); ?>">
                </p>
                <p>
                    

                    <label> <?php esc_attr_e( 'Embed Audio', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_embed_audio"><?php echo esc_attr( $mytheme_embed_audio ); ?> </textarea>
                        
                   
                </p>

                
               

            </div>
        </div>
   
        <?php
    }
}




add_action( 'save_post', 'mytheme_save_metaboxes','dynamic_save_postdata' );

if ( ! function_exists( 'mytheme_save_metaboxes' ) ) {
    /**
     * Save controls from the meta boxes
     *
     * @param  int $post_id Current post id.
     * @since 1.0.0
     */

    






    function mytheme_save_metaboxes( $post_id ) {
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times. Add as many nonces, as you
         * have metaboxes.
         */
        if ( ! isset( $_POST['mytheme_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['mytheme_control_meta_box_nonce'] ), 'mytheme_control_meta_box' ) ) { // Input var okay.
            return $post_id;
        }

        // Check the user's permissions.
        if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        /* Ok to save */

        if ( isset( $_POST['mytheme_artist'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_artist', sanitize_text_field( wp_unslash( $_POST['mytheme_artist'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_album_desc'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_album_desc', sanitize_text_field( wp_unslash( $_POST['mytheme_album_desc'] ) ) ); // Input var okay.
        }
         if ( isset( $_POST['mytheme_bandcamp_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_bandcamp_link', sanitize_text_field( wp_unslash( $_POST['mytheme_bandcamp_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_soundcloud_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_soundcloud_link', sanitize_text_field( wp_unslash( $_POST['mytheme_soundcloud_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_spotify_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_spotify_link', sanitize_text_field( wp_unslash( $_POST['mytheme_spotify_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_deezer_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_deezer_link', sanitize_text_field( wp_unslash( $_POST['mytheme_deezer_link'] ) ) ); // Input var okay.
        }

        if ( isset( $_POST['mytheme_studio_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_studio_link', sanitize_text_field( wp_unslash( $_POST['mytheme_studio_link'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_mastering_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_mastering_link', sanitize_text_field( wp_unslash( $_POST['mytheme_mastering_link'] ) ) ); // Input var okay.
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
        
        if ( isset( $_POST['mytheme_page_select'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_page_select', sanitize_text_field( wp_unslash( $_POST['mytheme_page_select'] ) ) ); // Input var okay.
        }
     
        if ( isset( $_POST['mytheme_datepicker'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_datepicker', sanitize_text_field( wp_unslash( $_POST['mytheme_datepicker'] ) ) ); // Input var okay.
        }

        if ( isset( $_POST['mytheme_featured_image'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_featured_image', sanitize_text_field( wp_unslash( $_POST['mytheme_featured_image'] ) ) ); // Input var okay.
        }
     

    }
}


?>