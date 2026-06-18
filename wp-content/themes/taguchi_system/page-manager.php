<?php //manager_only_page(); ?>

<?php get_header(); ?>

<div class="mypage_layout">
  <?php get_template_part('sidebar', 'mypage'); ?>

  <div class="mypageMain">
    <section class="managerSec sec">
      <h1 class="ttl">
        <?php
        if($headline = get_field('headline')) {
          echo $headline;
        } else {
          echo get_the_title();
        }
        ?>
      </h1>

      <?php $user = wp_get_current_user(); ?>
      <div class="userInfo__table">
        <dl>
          <dt>管理者名</dt>
          <dd>
            <span class="data"><?php echo get_user_meta($user->ID, 'last_name', true) . ' ' . get_user_meta($user->ID, 'first_name', true); ?></span>
          </dd>
        </dl>
        <dl>
          <dt>受信メールアドレス</dt>
          <dd>
            <span class="data"><?php echo $user->user_email; ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/manager-edit/">変更</a>
          </dd>
        </dl>
      </div>
    </section>
  </div><!-- end .mypageMain -->
</div>

<?php get_footer();