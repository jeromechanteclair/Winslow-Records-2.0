<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
 
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106046928-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1047007362107992');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1047007362107992&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/carousel.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Buenard:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
<?php
    /* 
     *  Add this to support sites with sites with threaded comments enabled.
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    wp_get_archives('type=monthly&format=link');
 
    wp_head();
?>
</head>
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

<!-- Photoswipe div  !-->
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>



    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand"><?php theme_prefix_the_custom_logo()?></a>
        </div>
        <div class="navbar-header pull-right">
              
            
  
     
<?php 

$facebook= get_theme_mod("facebook_code");

if ($facebook == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $facebook . '"class="social pull-right"><i class="fa fa-facebook-official fa-custom fa-lg"></i></a>&nbsp;&nbsp;';
}
?>
     
<?php 

$bandcamp= get_theme_mod("bandcamp_code");

if ($bandcamp == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $bandcamp . '"class="social pull-right" target="_blank"> <i class="fa fa-bandcamp fa-custom  fa-lg"> </i> </a>&nbsp;&nbsp;';
}
?>

<?php 

$youtube= get_theme_mod("youtube_code");

if ($youtube == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $youtube . '"class="social pull-right" target="_blank"><i class="fa-custom fa fa-youtube-play  fa-lg"></i></a>&nbsp;&nbsp;';
}
?>


<?php 

$soundcloud= get_theme_mod("soundcloud_code");

if ($soundcloud == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $soundcloud . '"class="social pull-right" target="_blank"><i class="fa fa-soundcloud fa-custom fa-lg"></i></a>&nbsp;&nbsp;';
}
?>
<?php 

$instagram= get_theme_mod("instagram_code");

if ($instagram == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $instagram . '"class="social pull-right" target="_blank"><i class="fa fa-instagram fa-custom fa-lg"></i></a>&nbsp;&nbsp;';
}
?>



   
    

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>  <?php  /* menu */
          wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'navbar-collapse ',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        ); 
      ?></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
    
