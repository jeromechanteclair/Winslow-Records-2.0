<?php get_header(); ?>
 
<div class="container container-normal" style="padding-top: 80px;">
<p>hello</p>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-12">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="post">
        <h2><?php the_title(); ?></h2>
 
 
            <div class="entry">
            <?php the_content(); ?>
 
                <p class="postmetadata">
                <?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
                <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
                </p>
 
            </div>
 
        </div>
         
<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
<?php endif; ?>
</div>
</div>
 
<?php get_sidebar(); ?>   
<?php get_footer(); ?>
