<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


 
// Register Custom Post Types
require_once('admin/artist-admin.php');
require_once('admin/home-admin.php');
require_once('admin/event-admin.php');
require_once('admin/album-admin.php');
require_once ('admin/gallery.php');
require_once ('admin/about-admin.php');



function wp_trim_all_excerpt($text) { // Creates an excerpt if needed; and shortens the manual excerpt as well
global $post;
if ( '' == $text ) {
$text = get_the_content('');
$text = apply_filters('the_content', $text);
$text = str_replace(']]>', ']]>', $text);
}
$text = strip_shortcodes( $text ); // optional
$text = strip_tags($text);
$excerpt_length = apply_filters('excerpt_length', 55);
$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
$words = explode(' ', $text, $excerpt_length + 1);
if (count($words)> $excerpt_length) {
array_pop($words);
$text = implode(' ', $words);
$text = $text . $excerpt_more;
} else {
$text = implode(' ', $words);
}
return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');



add_filter('body_class', 'mbe_body_class');

function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}


add_action('wp_head', 'mbe_wp_head');
function mbe_wp_head(){
    echo '<style>'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 46px !important; }'
    .PHP_EOL
    .'@media only screen and (min-width: 783px) {'
    .PHP_EOL
    .'body{ padding-top: 70px !important; }'
    .PHP_EOL
    .'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'body.logged-in .navbar-fixed-top{ top: 28px !important; }'
    .PHP_EOL
    .'}</style>'
    .PHP_EOL;
}

//thickbox
function include_thickbox_scripts()
{
    // include the javascript
    wp_enqueue_script('thickbox', null, array('jquery'));

    // include the thickbox styles
    wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
}
add_action('wp_enqueue_scripts', 'include_thickbox_scripts');

// Hihlight events

function wptuts_photowipe()
{
    
    wp_register_script( 'photoswipe', get_template_directory_uri() . '/js/photoswipe.min.js' );

 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'photoswipe' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_photowipe' );





function wptuts_photoswipe_ui()
{
    
    wp_register_script( 'photoswipe_ui', get_template_directory_uri() . '/js/photoswipe-ui-default.min.js' );

 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'photoswipe_ui' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_photoswipe_ui' );

function photoswipe_style()
{
    
    // Register the style like this for a theme:
    wp_register_style( 'custom-style', get_template_directory_uri() . '/photoswipe/default-skin.css', array(), '20120208', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'photoswipe_style' );

function photoswipe_css()
{
    
    // Register the style like this for a theme:
    wp_register_style( 'photoswipe-css', get_template_directory_uri() . '/css/photoswipe.css', array(), '20120208', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'photoswipe-css' );
}
add_action( 'wp_enqueue_scripts', 'photoswipe_css' );

// excertp length



function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 30 );

//gigs

add_action( 'wp_enqueue_scripts', 'misha_script_and_styles', 1 );

function misha_script_and_styles() {
  global $wp_query;
  
  
  wp_enqueue_style( 'parent_style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri(), array('parent_style'), time() );


  // register our main script but do not enqueue it yet
  wp_register_script( 'misha_scripts', get_stylesheet_directory_uri() . '/js/script.js',
   array('jquery'), time() );

  
 
  // now the most interesting part
  // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
  wp_localize_script( 'misha_scripts', 'misha_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
    'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
    'max_page' => $wp_query->max_num_pages
  ) );
 
  wp_enqueue_script( 'misha_scripts','photoswipe_js' );
}


add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
 
function misha_loadmore_ajax_handler(){
 
  // prepare our arguments for the query
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';
 
  // it is always better to use WP_Query but not here
  query_posts( $args );
 
  if( have_posts() ) :
 
    // run the loop
    while( have_posts() ): the_post();
 
      get_template_part( 'events', get_post_format() );
 
    endwhile;
 
  endif;
  die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_mishafilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_mishafilter', 'misha_filter_function');
 
function misha_filter_function(){
 
  // example: date-ASC 
  $order = explode( '-', $_POST['misha_order_by'] );
 $today = date("Y-m-d");
  $args = array(
    'meta_key' => 'mytheme_datepicker',

    'orderby' => 'meta_value',
    'post_type'=>'event',
    'posts_per_page' => $_POST['misha_posts_per_page'], // -1 to show all posts
   
    'order' => $order[1], // example: ASC
     'meta_query'=> array(
            array(
              'key' => 'mytheme_datepicker',
               'meta-value' => $value,
           'value' => $today,
           'compare' => $order[0],
           'type' => 'datetime'// you can change it to datetime
       )
        ),
  );
 
 
  query_posts( $args );
 
  global $wp_query;
 
  if( have_posts() ) :
 
    ob_start(); // start buffering because we do not need to print the posts now
 
    while( have_posts() ): the_post();
 
      get_template_part( 'events', get_post_format() );


 

    endwhile;

 
 
    $content = ob_get_contents(); // we pass the posts to variable
      ob_end_clean(); // clear the buffer
 

    
  endif;

  // no wp_reset_query() required
 
  echo json_encode( array(
    'posts' => serialize( $wp_query->query_vars ),
    'max_page' => $wp_query->max_num_pages,
    'found_posts' => $wp_query->found_posts,
    'content' => $content
  ) );
 
  die();
}


//

 
//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);

//Some simple code for our widget-enabled sidebar
if ( function_exists('register_sidebar') )
    register_sidebar();


//Code for custom background support
add_custom_background();


//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// allow custom logo image to be added from admin
function theme_prefix_setup() {
    
add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
function theme_prefix_the_custom_logo() {
    
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }


    add_filter('get_custom_logo','change_logo_class');
 
 
function change_logo_class($html)
{
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    return $html;
}

}
add_action('customize_register', 'themeslug_theme_customizer');


//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');


// crop excerpt

  


// Add pagination

if( !function_exists( 'theme_pagination' ) ) {
  
    function theme_pagination() {
  
  global $wp_query, $wp_rewrite;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  
  $pagination = array(
    'base' => @add_query_arg('page','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
          'show_all' => false,
          'end_size'     => 1,
          'mid_size'     => 2,
    'type' => 'div',
    'next_text' => '<i class="fa fa-caret-right " aria-hidden="true"></i>',
    'prev_text' => '<i class="fa fa-caret-left " aria-hidden="true"></i>'
  );
  
  if( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
  
  if( !empty($wp_query->query_vars['s']) )
    $pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
    
  echo str_replace('page/1/','', paginate_links( $pagination ) );
    } 
}



// Custom Post types


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'artiste',
    array(
      'labels' => array(
        'edit_item'  => __( "Editer l'artiste" ),
        'add_new' => __( 'Ajouter un artiste' ),
        'add_new_item' => __( 'Ajouter un artiste' ),
        'name' => __( 'Artistes' ),
        'singular_name' => __( 'Artiste' )
      ),'menu_icon'           => 'dashicons-id-alt',
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title',  'thumbnail' ),
      'hierarchical' => true,
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'artistes'),
    )
  );
   register_post_type( 'album',
    array(
      'labels' => array(
        'edit_item'  => __( "Editer l'album" ),
        'add_new' => __( 'Ajouter un album' ),
        'add_new_item' => __( 'Ajouter un album' ),
        'name' => __( 'Discographie' ),
        'singular_name' => __( 'Album' )
      ),
        'taxonomies' => array( 'category', 'post_tag' ),
        'supports' => array( 'title',  'thumbnail' ),
        'menu_icon'           => 'dashicons-album',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'discograhie'),
        'register_meta_box_cb' => 'add_album_metaboxes'

    )
  );
   register_post_type( 'event',
    array(
      'labels' => array(
        'edit_item'  => __( 'Editer le concert' ),
        'add_new' => __( 'Ajouter un concert' ),
        'add_new_item' => __( 'Ajouter un concert' ),
        'name' => __( 'Concerts' ),
        'singular_name' => __( 'Concert' )

      ),'menu_icon'           => 'dashicons-tickets-alt',
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title',  'thumbnail' ),
      'public' => true,
      'has_archive' => true,
       'rewrite' => array('slug' => 'concert'),
    )
  );

  register_post_type( 'gallerie',
    array(
      'labels' => array(
        'edit_item'  => __( 'Editer la gallerie' ),
        'add_new' => __( 'Ajouter une gallerie' ),
        'add_new_item' => __( 'Ajouter une gallerie' ),
        'name' => __( 'Souvenirs' ),
        'singular_name' => __( 'Souvenir' )

      ),'menu_icon'           => 'dashicons-format-gallery',
      'taxonomies' => array( 'category', 'post_tag' ),
      'supports' => array( 'title','editor',  'thumbnail' ),
      'public' => true,
      'hierarchical' => true,
      'has_archive' => true,
       'rewrite' => array('slug' => 'souvenir'),
    )
  ); 

}


function my_scripts_method() {
  wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/js/topbutton.js',
    array( 'jquery' )
  );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
// ajax script

function add_js_scripts() {
  wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );

  // pass Ajax Url to script.js
  wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action('wp_enqueue_scripts', 'add_js_scripts');

add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );

function mon_action() {
       global $post; 

  
$today = date("Y-m-d");
  $args = array(
      'post_type' =>'event',
  
    'meta_key' => 'mytheme_datepicker',

    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query'=> array(
            array(
              'key' => 'mytheme_datepicker',
               'meta-value' => $value,
           'value' => $today,
           'compare' => '>=',
           'type' => 'CHAR'// you can change it to datetime also
       )
        ),
  );

  $ajax_query = new WP_Query($args);

  //var_dump($ajax_query);

  if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
    get_template_part( 'events' );
  endwhile;
  endif;

  die();
}

add_action( 'wp_ajax_load_more', 'load_more' );
add_action( 'wp_ajax_nopriv_load_more', 'load_more' );

function load_more() {
        global $post; 

 
$today = date("Y-m-d");
  $args = array( 
    'post_type' =>'event',
  
    'meta_key' => 'mytheme_datepicker',

    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query'=> array(
            array(
              'key' => 'mytheme_datepicker',
               'meta-value' => $value,
           'value' => $today,
           'compare' => '<=',
           'type' => 'CHAR'// you can change it to datetime also
       )
        ),


     
  );

  $ajax_query = new WP_Query($args);

  if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
         get_template_part( 'events' );

               // OU include(locate_template('article.php'));
              
              // si vous avez besoin d'accéder aux variables dans le template
  endwhile;
  endif;

  die();
}
/**
 * Load admin scripts
 *
 * @param  string $hook Page hook.
 * @since 1.0.0.
 */
function mytheme_load_admin_script( $hook ) {
    if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
 
        wp_enqueue_style( 'admin-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', false, '', false );
 
        wp_enqueue_script( 'admin_js', get_template_directory_uri() . '/js/admin.js',  array( 'jquery', 'jquery-ui-datepicker', 'jquery-ui-slider' ) );

    }
}
 
add_action( 'admin_enqueue_scripts', 'mytheme_load_admin_script' );


// Custom metaboxes

add_action( 'add_meta_boxes', 'mytheme_add_meta_box' );

if ( ! function_exists( 'mytheme_add_meta_box' ) ) {
    /**
     * Add meta box to page screen
     *
     * This function handles the addition of variuos meta boxes to your page or post screens.
     * You can add as many meta boxes as you want, but as a rule of thumb it's better to add
     * only what you need. If you can logically fit everything in a single metabox then add
     * it in a single meta box, rather than putting each control in a separate meta box.
     *
     * @since 1.0.0
     */
    function mytheme_add_meta_box() {
     
        add_meta_box( 'additional-page-metabox-options', esc_html__( 'Fiche Album', 'mytheme' ), 'mytheme_metabox_controls', 'album', 'advanced', 'high' );
         


        add_meta_box( 'event_headline', esc_html__('Informations générales', 'mytheme'), 'mytheme_event_metabox', ' event', 'normal', 'high');
        add_meta_box( 'artist_metabox', esc_html__('Informations générales', 'mytheme'), 'mytheme_artist_metabox', ' artiste', 'normal', 'high');
        
       
        
        
    }
}


























// Customize admin menu

function sitepoint_customize_register($wp_customize) 
{
    $wp_customize->add_section("social", array(
        "title" => __("Réseaux sociaux", "customizer_social_sections"),
        "priority" => 30,
    ));
     

    $wp_customize->add_setting("facebook_code", array(
        "default" => "",
        "transport" => "postMessage",
    )


    );
     $wp_customize->add_setting("bandcamp_code", array(
        "default" => "",
        "transport" => "postMessage",
    )


    );
      $wp_customize->add_setting("soundcloud_code", array(
        "default" => "",
        "transport" => "postMessage",
    )


    );
       $wp_customize->add_setting("youtube_code", array(
        "default" => "",
        "transport" => "postMessage",
    )


    );
    $wp_customize->add_setting("instagram_code", array(
        "default" => "",
        "transport" => "postMessage",
    )


    );



    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "facebook_code",
        array(
            "label" => __("Enter facebook url", "customizer_social_code_label"),
            "section" => "social",
            "settings" => "facebook_code",
            "type" => "textarea",
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bandcamp_code",
        array(
            "label" => __("Enter bandcamp url", "customizer_social_code_label"),
            "section" => "social",
            "settings" => "bandcamp_code",
            "type" => "textarea",
        )
    ));
     $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "soundcloud_code",
        array(
            "label" => __("Enter soundcloud url", "customizer_social_code_label"),
            "section" => "social",
            "settings" => "soundcloud_code",
            "type" => "textarea",
        )
    ));



    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "youtube_code",
        array(
            "label" => __("Enter youtube url", "customizer_social_code_label"),
            "section" => "social",
            "settings" => "youtube_code",
            "type" => "textarea",
        )
    ));

     $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "instagram",
        array(
            "label" => __("Enter instagram url", "customizer_social_code_label"),
            "section" => "social",
            "settings" => "instagram_code",
            "type" => "textarea",
        )
    ));


   

}

add_action("customize_register","sitepoint_customize_register");


 
?>
