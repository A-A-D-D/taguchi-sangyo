<?php get_header(); ?>

<?php
$args = array(
  'txt01' => 'あしたあり',
  'txt02' => '心しずかに　',
  'txt03' => 'ときをまつべし',
  'dir' => get_stylesheet_directory_uri() . '/images/voice',
  'file_name' => 'header_img',
);
get_template_part('template-parts/content-page-header', null, $args);
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="voiceSec sec">
  <div class="container">
    <h1 class="secTtl">お客様の声</h1>
    
    <?php
    if (have_posts()) :
    ?>
    <ul class="voice__list">
      <?php while(have_posts()) : the_post(); ?>
      <li class="item">
        <p class="name"><?php echo get_field('name'); ?></p>
        <h3 class="ttl"><?php echo get_the_title(); ?></h3>
        <p class="txt"><?php echo get_field('message'); ?></p>
      </li>
      <?php endwhile; ?>
    </ul>

    <?php
    the_posts_pagination( array(
      'mid_size' => 2,
      'prev_text' => '<i class="fa-solid fa-angles-left"></i>前へ',
      'next_text' => '次へ<i class="fa-solid fa-angles-right"></i></i>',
    ));
    ?>

    <?php endif; ?>
  </div>
</section>

<?php
$args = array(
  'dir' => get_stylesheet_directory_uri() . '/images/voice',
  'file_name' => 'bottom_img',
);
get_template_part('template-parts/bottom-img', null, $args);
?>

<?php get_footer();