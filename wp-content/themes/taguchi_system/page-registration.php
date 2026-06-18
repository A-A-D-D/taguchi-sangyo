<?php get_header(); ?>

<section class="registrationSec">
  <div class="container">
    <h1 class="ttl__layout01"><?php echo get_field('headline'); ?></h1>

    <div class="form__wrap">
      <?php the_content(); ?>
    </div>

  </div>
</section>

<?php get_footer();