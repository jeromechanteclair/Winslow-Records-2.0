<?php 



function add_form_meta()
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-about.php' )
        {
            add_meta_box( 'About', esc_html__('Contact form'), 'mytheme_about_metabox', 'page', 'normal', 'high');
        }
    }
}

add_action('add_meta_boxes', 'add_form_meta');


function mytheme_about_metabox(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0];  
?>  
    <label>Shortcode</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
    }


add_action('save_post', 'save_project_link'); 
   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]); 
    } 
}




?>