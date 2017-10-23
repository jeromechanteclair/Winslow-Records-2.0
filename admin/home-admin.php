<?php

function only_home_settings() {
   // only add this meta box to the page selected as front page:
   global $post;
   $frontpage_id = get_option('page_on_front');
   if($post->ID == $frontpage_id):
      add_meta_box('Home', 'Home:', 'mytheme_home_metabox', 'page', 'normal', 'core');
   endif;
}
 
// other meta box bits (form function and save function)
 
add_action( 'add_meta_boxes', 'only_home_settings' ); // ...add the action as normal, as well as other add_actions for this meta


function mytheme_home_metabox($post) {

   
    $home_metabox = get_post_meta($post->ID);  

    
    $mytheme_embed_audio = ( isset( $home_metabox['mytheme_embed_audio'][0] ) && '' !== $home_metabox['mytheme_embed_audio'][0] ) ? $home_metabox['mytheme_embed_audio'][0] : '';
     $mytheme_embed_video = ( isset( $home_metabox['mytheme_embed_video'][0] ) && '' !== $home_metabox['mytheme_embed_video'][0] ) ? $home_metabox['mytheme_embed_video'][0] : '';
  

    wp_nonce_field( 'mytheme_home_metabox_nonce', 'mytheme_home_metabox_nonce' );
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
                <label> <?php esc_attr_e( 'Embed 1', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_embed_audio"><?php echo htmlspecialchars( $mytheme_embed_audio ); ?> </textarea>
                        </p>

                 
               
               

          </div> 
          <div class="table-right">
                    
          

                        <p>
                <label> <?php esc_attr_e( 'Embed 2', 'mytheme' ); ?></label> 
                    <textarea rows="5" class="widefat article_desc" name="mytheme_embed_video"><?php echo esc_attr( $mytheme_embed_video ); ?> </textarea>
                        </p> 

                </div> 

             
               </div>
           

    <?php
}
add_action('save_post', 'mytheme_home_metabox_save');
function mytheme_home_metabox_save($post_id) {
    if ( ! isset( $_POST['mytheme_home_metabox_nonce'] ) ||
        ! wp_verify_nonce( $_POST['mytheme_home_metabox_nonce'], 'mytheme_home_metabox_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'home_metabox', true);
    $new = array();
    
    
  


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
                            'style'=> array(),
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
        update_post_meta( $post_id, 'home_metabox', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'home_metabox', $old );
}





?>