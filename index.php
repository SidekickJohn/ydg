<?php get_header(); ?>
<div id=content" class="site-content container">
  <div class="row page-top">
    <h2><a href="http://localhost/yourdailygreen/fundgrube/">Fundgrube</a></h2>
  </div>
  <div class="row pull-left page-back">
  <div id="primary" class="content-area col-sm-12 col-md-8">
    <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'content', get_post_format() );
        ?>
      <?php endwhile; ?>
      <?php paging_nav(); ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
    </main>
  </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
