<?php global $post; ?>

<div class="breadcrumb">
  <span class="top"><a href="<?php echo home_url(); ?>">TOP</a></span>
  <span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="4" height="7" viewBox="0 0 4 7"><path d="M14.041,9.695,11.393,7.048a.5.5,0,0,1,0-.707.5.5,0,0,1,.708,0l3,3a.5.5,0,0,1,.015.69L12.1,13.05a.5.5,0,1,1-.708-.707Z" transform="translate(-11.246 -6.196)" fill="#383838"/></svg></span>

  <?php
  /* 固定ページ */
  if(is_page()) :
    if($post->post_parent != 0) :
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      foreach($ancestors as $ancestor) :
  ?>
  <span class="item"><a href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor) ?></a></span>
  <?php
      endforeach;
    endif;
  ?>
  <span class="current"><?php echo $post->post_title; ?></span>
  <?php
  else :
  ?>
  <span class="current"><?php echo get_the_archive_title(); ?></span>
  <?php
  endif;
  ?>

</div>