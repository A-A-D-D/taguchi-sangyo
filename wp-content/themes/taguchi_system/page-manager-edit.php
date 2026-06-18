<?php //manager_only_page(); ?>

<?php get_header(); ?>

<div class="mypage_layout">
  <?php get_template_part('sidebar', 'mypage'); ?>

  <div class="mypageMain">
    <section class="manager-editSec sec">
      <h1 class="ttl">
        <?php
        if($headline = get_field('headline')) {
          echo $headline;
        } else {
          echo get_the_title();
        }
        ?>
      </h1>

      <?php echo do_shortcode('[contact-form-7 id="b63a80f" title="manager-edit_form"]'); ?>
      
    </section>
  </div><!-- end .mypageMain -->
</div>

<?php get_footer();