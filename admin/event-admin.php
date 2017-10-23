<?php 
add_action('admin_init', 'slider_metabox_caption', 1);
function slider_metabox_caption() {
add_meta_box( 'repeatable-fields', 'Line-up', 'repeatable_metabox_display', 'event', 'normal', 'high'); }








function repeatable_metabox_display() {
global $post;

$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' ); ?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.metabox_submit').click(function(e) {
            e.preventDefault();
            $('#publish').click();
        });
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

        $('#repeatable-fieldset-one').sortable({
            opacity: 0.6,
            revert: true,
            cursor: 'move',
            handle: '.sort'
        });
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

<div id="repeatable-fieldset-one" width="100%">


  
    <?php 
    if ( $repeatable_fields ) :
        foreach ( $repeatable_fields as $field ) { ?>

  <div id="table">
        
    <p class="table-left"> 
        <label> Nom de l'artiste </label> 
       <input type="text" class="widefat" name="article_name[]" value="<?php if($field['article_name'] != '') echo esc_attr( $field['article_name'] ); ?>" />
         <label> Genre </label> 
       <input type="text" class="widefat" name="article_genre[]" value="<?php if($field['article_genre'] != '') echo esc_attr( $field['article_genre'] ); ?>" />
         <label> Lien facebook </label> 
       <input type="text" class="widefat" name="article_facebook[]" value="<?php if($field['article_facebook'] != '') echo esc_attr( $field['article_facebook'] ); ?>" />
         <label> Autre lien </label> 
        <input type="text" class="widefat" name="article_link[]" value="<?php if($field['article_link'] != '') echo esc_attr( $field['article_link'] ); ?>" />
        </p>
        <p class="table-right"> 
         <label> Description </label> 

<textarea rows="5" class="widefat article_desc" name="article_desc[]"><?php if ($field['article_desc'] != '') echo esc_attr( $field['article_desc'] ); ?></textarea>
        



         <label> Embed video </label> 
        <textarea rows="5"  class="widefat article_embed" name="article_embed[]"><?php if ($field['article_embed'] != '') echo esc_attr( $field['article_embed'] ); ?></textarea></p>
<section id="controls">
       <a class="button remove-row" href="#">-</a><a class="sort"><i class="icons dashicons-move"></i></a></section>
                    <hr>
</div>
  
    <?php } else : 
    // show a blank one ?>
 <div id="table">
   
  <p class="table-left"> 
        <label> Nom de l'artiste </label>       
        <input type="text" class="widefat" name="article_name[]" />
        <label> Genre </label> 
        <input type="text" class="widefat" name="article_genre[]" />
        <label> Lien facebook </label> 
        <input type="text" class="widefat" name="article_facebook[]" />
        <label> Autre lien </label> 
        <input type="text" class="widefat" name="article_link[]" />
        </p>
          <p class="table-right"> 
        <label> Description </label> 
         <textarea rows="5" class="widefat article_desc" name="article_desc[]"></textarea>
        <label> Embed video </label> 
         <textarea rows="5" class="widefat article_desc" name="article_embed[]"></textarea>
        </p>

    <section id="controls">
       <a class="button remove-row" href="#">-</a><a class="sort"><i class="icons dashicons-move"></i></a></section>
                    <hr>

   </div>

    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <div class="empty-row screen-reader-text">
     <div id="table">
       

       
        <p class="table-left"> 
        <label> Nom de l'artiste </label>       
        <input type="text" class="widefat" name="article_name[]" />
        <label> Genre </label> 
        <input type="text" class="widefat" name="article_genre[]" />
        <label> Lien facebook </label> 
        <input type="text" class="widefat" name="article_facebook[]" />
        <label> Autre lien </label> 
        <input type="text" class="widefat" name="article_link[]" />
        </p>
          <p class="table-right"> 
        <label> Description </label> 
         <textarea rows="5" class="widefat article_desc" name="article_desc[]"></textarea>
        <label> Embed video </label> 
         <textarea rows="5" class="widefat article_desc" name="article_embed[]"></textarea>
        </p>

    <section id="controls">
       <a class="button remove-row" href="#">-</a><a class="sort"><i class="icons dashicons-move"></i></a></section>
                    <hr>
</div>
    </div>
    
</div>

<p><a id="add-row" class="button" href="#">Add another</a>
<input type="submit" class="metabox_submit" value="Save" />
</p>

<?php
}

add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
    return;

if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;

if (!current_user_can('edit_post', $post_id))
    return;

$old = get_post_meta($post_id, 'repeatable_fields', true);
$new = array();

$text = $_POST['text'];
$article_name = $_POST['article_name'];
$article_genre = $_POST['article_genre'];
$article_facebook = $_POST['article_facebook'];
$article_link = $_POST['article_link'];
$article_desc = $_POST['article_desc'];
$article_embed = $_POST['article_embed'];

$count = count( $article_name );

for ( $i = 0; $i < $count; $i++ ) {
    if ( $article_name[$i] != '' ) :
        $new[$i]['tarticle_name'] = stripslashes( strip_tags( $article_name[$i] ) );
    if ( $article_name[$i] != '' ) 
            $new[$i]['article_name'] = $article_name[$i];
        else $new[$i]['article_name'] = '';
    if ( $article_genre[$i] != '' ) 
            $new[$i]['article_genre'] = $article_genre[$i];
        else $new[$i]['article_genre'] = '';
    if ( $article_facebook[$i] != '' ) 
            $new[$i]['article_facebook'] = $article_facebook[$i];
        else $new[$i]['article_facebook'] = '';
   if ( $article_link[$i] != '' ) 
        $new[$i]['article_link'] = $article_link[$i];
    else $new[$i]['article_link'] = '';

    if ( $article_desc[$i] != '' ) 
            $new[$i]['article_desc'] = $article_desc[$i];
        else $new[$i]['article_desc'] = '';
    if ( $article_embed[$i] != '' ) 
            $new[$i]['article_embed'] = $article_embed[$i];
        else $new[$i]['article_embed'] = '';
    
  

    endif;
}


if ( !empty( $new ) && $new != $old )
    update_post_meta( $post_id, 'repeatable_fields', $new );
elseif ( empty($new) && $old )
    delete_post_meta( $post_id, 'repeatable_fields', $old );}

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
                  
                  
                </p>  <p class="separator gallery_buttons">
                        <input id="mytheme_gallery_input" type="hidden" name="mytheme_gallery" value="<?php echo esc_attr( $mytheme_gallery ); ?>" />
                        <input id="manage_gallery" title="<?php esc_html_e( 'Manage gallery', 'mytheme' ); ?>" type="button" class="button" value="<?php esc_html_e( 'Upload / Manage', 'mytheme' ); ?>" />
                       
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