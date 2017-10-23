<?php
add_action('admin_init', 'add_meta_boxes', 1);
function add_meta_boxes() {
    add_meta_box( 'repeatable-fields', esc_html__('Related Articles', 'mytheme'), 'my_related_articles_meta_box_display', 'event', 'normal', 'high');
}

function my_related_articles_meta_box_display() {
    global $post;
    $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        'use strict';
        $('#add-row').on('click', function() {
            var row = $('.empty-row.screen-reader-text').clone(true);
            row.removeClass('empty-row screen-reader-text');
            row.insertBefore('#add-row ');
            return false;
        });
        $('.remove-row').on('click', function() {
           $(this).parents('#table').remove();
            return false;
        });
        $('#repeatable-fieldset-one ').sortable({
            opacity: 0.9,
            revert: true,
            cursor: 'move',
            handle: '.sort'
        });
        var _link_sideload = false; //used to track whether or not the link dialogue actually existed on this page, ie was wp_editor invoked.
        var link_btn = (function($){
            'use strict';
            var _link_sideload = false; //used to track whether or not the link dialogue actually existed on this page, ie was wp_editor invoked.
            /* PRIVATE METHODS
            -------------------------------------------------------------- */


            //add event listeners
            function _init() {
                $('body').on('click', '#add-link', function(event) {
                    function add_empty_row() {
                        var row = $('.empty-row.screen-reader-text').clone(true);
                        row.removeClass('empty-row screen-reader-text');
                        row.insertBefore('#repeatable-fieldset-one ');
                        return false;
                    }
                    if ( !$('#repeatable-fieldset-one tbody').find('tr:first-of-type').hasClass('empty-row screen-reader-text') ) {
                        if ($('#repeatable-fieldset-one tbody').find('tr:first-of-type input[name="article_name[]"]').val() !== '') {
                            add_empty_row();
                        }
                    } else{
                        add_empty_row();
                    }
                    _addLinkListeners();
                    _link_sideload = false;
                    if ( typeof wpActiveEditor != 'undefined') {
                        wpLink.open();
                    } else {
                        window.wpActiveEditor = true;
                        _link_sideload = true;
                        wpLink.open();
                    }
                    return false;
                });
            }
            
            return {
                init: _init,
            };
        })(jQuery);
        // Initialize
        link_btn.init();
    });
    </script>
    <style type="text/css">
    #repeatable-fieldset-one .icons{
        font: 400 20px/1 dashicons;
        speak: none;
        display: inline-block;
        padding: 4px 2px 0 0;
        top: 0;
        left: -1px;
        position: relative;
        vertical-align: top;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-decoration: none!important;
        cursor: move;
        cursor: grab;
        cursor: -moz-grab;
        cursor: -webkit-grab;
    }
    #repeatable-fieldset-one .icons:active{
        cursor: grabbing;
        cursor: -moz-grabbing;
        cursor: -webkit-grabbing;
    }
    #repeatable-fieldset-one a .icons{
        color: #0073aa;
    }
    #repeatable-fieldset-one a:hover .icons{
        color: #0073aa;
    }
    #repeatable-fieldset-one .icons .dashicons-menu:before{
        content: "\f333";

    }
    .table-left{display: inline-block;width: 45%;margin-right: 30px; vertical-align: top;}
    .table-right{display: inline-block;width: 45%;margin-right: 30px; vertical-align: top;}
    label {font-weight: 500;}
    
    
    </style>
 
    <div id="repeatable-fieldset-one" width="50%">
    


        <?php
        if ( $repeatable_fields ) :
            foreach ( $repeatable_fields as $field ) {
        ?>
           
        <div id="table">
                     <p class="table-left"> 
               
                           
                       <label> Nom de l'artiste </label> 
                       <input type="text" class="widefat article_name" name="article_name[]" value="<?php if($field['article_name'] != '') echo esc_attr( $field['article_name'] ); ?>" />
                         <label> Genre </label> 
                        <input type="text" class="widefat article_genre" name="article_genre[]" value="<?php echo esc_attr( $field['article_genre'] ); ?>" />
                         <label> Facebook link </label> 
                        <input  type="text" class="widefat article_facebook" name="article_facebook[]" value="<?php if ($field['article_facebook'] != '') echo esc_attr( $field['article_facebook'] );  ?>" />
                          
                        <label> Other link </label> 
                        <input  type="text" class="widefat article_link" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] );  ?>" />
                        </p>   

                        <p class="table-right">
                        <label> Description</label> 
                        <textarea rows="5" class="widefat article_desc" name="article_desc[]"><?php if ($field['article_desc'] != '') echo esc_attr( $field['article_desc'] ); ?></textarea>
                         <label> Embed link</label> 
                        
                        <textarea  class="widefat article_embed" name="article_embed[]"><?php if ($field['article_embed'] != '') echo esc_attr( $field['article_embed'] ); ?></textarea>
                        </p>


                        <section id="controls">
                        <a class="button remove-row" href="#">-</a>
                        <a class=" sort"><i class="icons dashicons-move"></i></a></section>
                        <hr>
        </div>
                <?php
                    }
                else :
                ?>
          <div id="table">
             <p class="table-left"> 

                   
               <label> Nom de l'artiste </label> 
               <input type="text" class="widefat article_name" name="article_name[]" value="" />
                 <label> Genre </label> 
                <input type="text" class="widefat article_genre" name="article_genre[]" value="" />
                 <label> Facebook link </label> 
                <input  type="text" class="widefat article_facebook" name="article_facebook[]" value="" />
                  
                <label> Other link </label> 
                <input  type="text" class="widefat article_link" name="url[]" value="" />
                </p>   

                <p class="table-right">
                <label> Description</label> 
                <textarea rows="5" class="widefat article_desc" name="article_desc[]"></textarea>
                 <label> Embed link</label> 
                
                <textarea  class="widefat article_embed" name="article_embed[]"></textarea>
                </p>


                <section id="controls">
                <a class="button remove-row" href="#">-</a>
                <a class=" sort"><i class="icons dashicons-move"></i></a></section>
                <hr>
           </div>
                
            <?php endif; ?>
    <div class="empty-row screen-reader-text">

        <div id="table">
                 <p class="table-left"> 
           
                       
                   <label> Nom de l'artiste </label> 
                   <input type="text" class="widefat article_name" name="article_name[]" value="" />
                     <label> Genre </label> 
                    <input type="text" class="widefat article_genre" name="article_genre[]" value="" />
                     <label> Facebook link </label> 
                    <input  type="text" class="widefat article_facebook" name="article_facebook[]" value="" />
                      
                    <label> Other link </label> 
                    <input  type="text" class="widefat article_link" name="url[]" value="" />
                    </p>   

                    <p class="table-right">
                    <label> Description</label> 
                    <textarea rows="5" class="widefat article_desc" name="article_desc[]"></textarea>
                     <label> Embed link</label> 
                    
                    <textarea  class="widefat article_embed" name="article_embed[]"></textarea>
                    </p>


                    <section id="controls">
                    <a class="button remove-row" href="#">-</a>
                    <a class=" sort"><i class="icons dashicons-move"></i></a></section>
                    <hr>
        </div>
    </div>
     
        <p><a id="add-row" class="button" href="#"><?php esc_html_e('Ajouter un artiste', 'mytheme'); ?></a>
        
        </p>
 
    <?php
}
add_action('save_post', 'my_related_articles_meta_box_save');
function my_related_articles_meta_box_save($post_id) {
    if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
        ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'repeatable_fields', true);
    $new = array();
    $names = $_POST['article_name'];
    $genres = $_POST['article_genre'];
    $fb = $_POST['article_facebook'];
    $embs = $_POST['article_embed'];
    $descs = $_POST['article_desc'];
    $urls = $_POST['url'];
    $count = count( $names );
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['article_name'] = stripslashes( strip_tags( $names[$i] ) );
        if ( $genres[$i] != '' ) 
            $new[$i]['article_genre'] = $genres[$i];
        else $new[$i]['article_genre'] = '';
        if ( $fb[$i] != '' ) 
            $new[$i]['article_facebook'] = $fb[$i];
        else $new[$i]['article_facebook'] = '';
        if ( $descs[$i] != '' ) 
            $new[$i]['article_desc'] = $descs[$i];
        else $new[$i]['article_desc'] = '';
        if ( $embs[$i] != '' ) 
            $new[$i]['article_embed'] = $embs[$i];  
        else $new[$i]['article_embed'] = '';
        if ( $urls[$i] == 'http://' )
            $new[$i]['url'] = '';
        else
            $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'repeatable_fields', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'repeatable_fields', $old );
}

function mytheme_event_gallery($post) {

   
    $event_gallery = get_post_meta($post->ID);  
     $mytheme_gallery = ( isset( $event_gallery['mytheme_gallery'][0] ) ) ? $event_gallery['mytheme_gallery'][0] : '';
   


    wp_nonce_field( 'mytheme_eventgallery_metabox_nonce', 'mytheme_eventgallery_metabox_nonce' );
?>
   
    <style type="text/css">
            .gallerie .title{font-size: 14px; padding: 8px 12px 8px 0; margin: 0; line-height: 1.4; font-weight: 600;}
            .gallerie  .gallery-item{position: relative; display: inline-block; vertical-align: top; margin-right: 10px; margin-bottom: 10px;}
            .gallerie  .gallery-item img{width: 200px; display: inline-block; vertical-align: top;}
            .gallerie  .gallery-item .remove{position: absolute; top: 5px; right: 5px; width: 20px; height: 20px; background: #000; border-radius: 50%; border: 1px solid #fff; color: #fff; text-align: center; font-weight: 600;
            line-height: 18px; cursor: pointer; display: none;}
            .gallerie  .gallery-item:hover .remove{display: block;}
    </style>

           
    <div class="gallerie"><p>
                    <label for="mytheme_gallery"><?php esc_html_e( 'Project Gallery', 'mytheme' ); ?></label>
                    <div class="gallery_images">
                        <?php
                        $img_array = ( isset( $mytheme_gallery ) && '' !== $mytheme_gallery ) ? explode( ',', $mytheme_gallery ) : '';
                        if ( '' !== $img_array ) {
                            foreach ( $img_array as $img ) {
                                echo '<div class="gallery-item" data-id="' . esc_attr( $img ) . '"><div class="remove">x</div>' . wp_get_attachment_image( $img ) . '</div>';
                            }
                        }
                        ?>
                  
                    <p class="separator gallery_buttons">
                        <input id="mytheme_gallery_input" type="hidden" name="mytheme_gallery" value="<?php echo esc_attr( $mytheme_gallery ); ?>" />
                        <input id="manage_gallery" title="<?php esc_html_e( 'Manage gallery', 'mytheme' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Upload / Manage', 'mytheme' ); ?>" />
                       
                    </p>
                </p>
    </div>
           

    <?php
}
add_action('save_post', 'mytheme_eventgallery_metabox_save');
function mytheme_eventgallery_metabox_save($post_id) {
    if ( ! isset( $_POST['mytheme_eventgallery_metabox_nonce'] ) ||
        ! wp_verify_nonce( $_POST['mytheme_eventgallery_metabox_nonce'], 'mytheme_eventgallery_metabox_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'event_gallery', true);
    $new = array();
    
    
    
          if ( isset( $_POST['mytheme_gallery'] ) ) { // Input var okay.
    update_post_meta( $post_id, 'mytheme_gallery', sanitize_text_field( wp_unslash( $_POST['mytheme_gallery'] ) ) ); // Input var okay.
}
        

    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'event_gallery', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'event_gallery', $old );
}



function mytheme_event_metabox($post) {

   
    $event_headline = get_post_meta($post->ID);  
    $mytheme_featured_image = ( isset( $event_headline['mytheme_featured_image'][0] ) ) ? $event_headline['mytheme_featured_image'][0] : '';
    $mytheme_datepicker = ( isset( $event_headline['mytheme_datepicker'][0] ) && '' !== $event_headline['mytheme_datepicker'][0] ) ? $event_headline['mytheme_datepicker'][0] : '';
    $mytheme_input_location = ( isset( $event_headline['mytheme_input_location'][0] ) && '' !== $event_headline['mytheme_input_location'][0] ) ? $event_headline['mytheme_input_location'][0] : '';
    $mytheme_input_link = ( isset( $event_headline['mytheme_input_link'][0] ) && '' !== $event_headline['mytheme_input_link'][0] ) ? $event_headline['mytheme_input_link'][0] : '';


    wp_nonce_field( 'mytheme_event_metabox_nonce', 'mytheme_event_metabox_nonce' );
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


    <p class="table-left">
                    <label><?php esc_attr_e( 'Lieu', 'mytheme' ); ?></label>
                    <input type="text" class="widefat" name="mytheme_input_location" value="<?php echo esc_attr( $mytheme_input_location ); ?>">
                
                
                    <label><?php esc_attr_e( 'Facebook link', 'mytheme' ); ?></label>
                    <input type="text" class="widefat" name="mytheme_input_link" value="<?php echo esc_attr( $mytheme_input_link ); ?>">
               
                 
<label>Date</label>          
<input type="text" id="mytheme_datepicker" name="mytheme_datepicker" class="widefat" value="<?php echo esc_attr( $mytheme_datepicker ); ?>" />

          </p> 
          <p class="table-right">
                    <label for="mytheme_featured_image"><?php esc_html_e( 'Affiche', 'mytheme' ); ?></label>
                    <span class=" widefat uploaded_image">
                    <?php if ( '' !== $mytheme_featured_image ) : ?>
                        <img src="<?php echo esc_url( $mytheme_featured_image ); ?>" />
                    <?php endif; ?>
                    </span>
                    <input type="text" name="mytheme_featured_image" value="<?php echo esc_url( $mytheme_featured_image ); ?>" class="featured_image_upload">
                    <input type="button" name="image_upload" value="<?php esc_html_e( 'Upload Image', 'mytheme' ); ?>" class="button upload_image_button">
                    <input type="button" name="remove_image_upload" value="<?php esc_html_e( 'Remove Image', 'mytheme' ); ?>" class="button remove_image_button">
                </p> 
             
               </div>
           

    <?php
}
add_action('save_post', 'mytheme_event_metabox_save');
function mytheme_event_metabox_save($post_id) {
    if ( ! isset( $_POST['mytheme_event_metabox_nonce'] ) ||
        ! wp_verify_nonce( $_POST['mytheme_event_metabox_nonce'], 'mytheme_event_metabox_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'event_headline', true);
    $new = array();
    
    
     if ( isset( $_POST['mytheme_featured_image'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_featured_image', sanitize_text_field( wp_unslash( $_POST['mytheme_featured_image'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_datepicker'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_datepicker', sanitize_text_field( wp_unslash( $_POST['mytheme_datepicker'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_input_location'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_input_location', sanitize_text_field( wp_unslash( $_POST['mytheme_input_location'] ) ) ); // Input var okay.
        }
        if ( isset( $_POST['mytheme_input_link'] ) ) { // Input var okay.
            update_post_meta( $post_id, 'mytheme_input_link', sanitize_text_field( wp_unslash( $_POST['mytheme_input_link'] ) ) ); // Input var okay.
        }

    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'event_headline', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'event_headline', $old );
}





?>