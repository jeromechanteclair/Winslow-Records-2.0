


	
<div class="container-fluid" id="upfooter">  

      <h3 class="inverse center marginbottom">Suivez-nous ! </h3>

<?php 

$facebook= get_theme_mod("facebook_code");

if ($facebook == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $facebook . '"class="social " target="_blank"><i class="fa fa-custom fa-facebook-official  fa-2x"></i></a>';
}
?>
     
<?php 

$bandcamp= get_theme_mod("bandcamp_code");

if ($bandcamp == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $bandcamp . '"class="social " target="_blank"><i class="fa fa-bandcamp fa-custom  fa-2x"></i></a>';
}
?>

<?php 

$youtube= get_theme_mod("youtube_code");

if ($youtube == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $youtube . '"class="social " target="_blank"><i class="fa fa-youtube-play fa-custom fa-2x"></i></a>';
}
?>


<?php 

$soundcloud= get_theme_mod("soundcloud_code");

if ($soundcloud == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $soundcloud . '"class="social " target="_blank"><i class="fa fa-soundcloud fa-custom fa-2x"></i></a>';
}
?>
<?php 

$instagram= get_theme_mod("instagram_code");

if ($instagram == '') {
echo '&nbsp;';
} else {
echo '<a href="' . $instagram . '"class="social " target="_blank"><i class="fa fa-instagram fa-custom fa-2x"></i></a>';
}
?>

<br>



     
<br class="hidden-xs">


<?php $args = array(
'prepend' => '', 
'showname' => false,
'nametxt' => 'Name:', 
'nameholder' => 'Name...', 
'emailtxt' => '',
'emailholder' => 'Adresse e-mail..', 
'showsubmit' => true, 
'submittxt' => "S'abonner", 
'jsthanks' => false,
'thankyou' => 'Merci de votre abonnement à la Newsletter'
);
echo smlsubform($args); ?>


<br><br>

  </div>
      <!-- FOOTER -->
      <footer style="">
        <a class="topbutton" href="#"><i class="fa fa-arrow-up " aria-hidden="true"></i></a>

      <div class="container-fluid" id="subfooter">  
    	<div class="col-sm-12 " style="">

<?php  $args = array(
    'post_type' => 'page',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => '_wp_page_template',
            'value' => 'page-about.php'
        )
    )
);
$contact_page = new WP_Query( $args );


  ?>




       <p> <span>&copy; 2017  <?php bloginfo('name'); ?></span> <span>




<a href="<?php echo get_permalink( $contact_page->post->ID );?>#form">- contact</a>

      </span> <span class="pull-right"> 
 <a href="https://www.facebook.com/jerome.chanteclair" target="_blank">conception</a></p></span></div>

  </div>
      </footer>

  

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>





<?php wp_footer(); ?>
</body>
</html>
