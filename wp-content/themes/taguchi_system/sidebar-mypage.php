<div class="mypageSidebar">
  <?php if(current_user_can('shop_manager')) : ?>
  <div class="sideTtl">
    <i class="fa-solid fa-house"></i>
    <span>管理者ページ</span>
  </div>
  <?php else : ?>
  <?php $user = wp_get_current_user(); ?>
  <div class="sideTtl">
    <i class="fa-solid fa-user"></i>
    <div class="userInfo">
      <p class="userName"><?php echo get_user_meta($user->ID, 'last_name', true) . ' ' . get_user_meta($user->ID, 'first_name', true); ?></p>
      <p class="userId"><?php echo $user->user_login; ?></p>
    </div>
  </div>
  <?php endif; ?>

  <?php if(current_user_can('shop_manager')) : ?>
  <ul class="sideMenu">
    <li class="item <?php if(is_page('manager') || is_page('manager-edit')) echo 'current'; ?>">
      <a href="<?php echo home_url(); ?>/manager/">管理者情報</a>
    </li>
    <!-- <li class="item">
      <a href="<?php echo home_url(); ?>/member-list/">会員一覧</a>
    </li> -->
    <li class="item <?php if(is_page('regular-order-list')) echo 'current'; ?>">
      <a href="<?php echo home_url(); ?>/regular-order-list/">注文情報</a>
    </li>
    <!-- <li class="item">
      <a href="<?php echo home_url(); ?>/mail-magazine/">メールマガジン機能</a>
    </li> -->
  </ul>
  <?php else : ?>
  <ul class="sideMenu">
    <li class="item <?php if(is_page('profile') || is_page('profile-edit')) echo 'current'; ?>">
      <a href="<?php echo home_url(); ?>/profile/">登録情報確認・変更</a>
    </li>
    <li class="item <?php if(is_page('site') || is_page('site-add')) echo 'current'; ?>">
      <a href="<?php echo home_url(); ?>/site/">現場追加・削除</a>
    </li>
  </ul>
  <?php endif; ?>

  <div class="sideBottom">
    <a class="logoutBtn" href="?a=logout">ログアウト</a>
    <?php if(is_page('manager') || is_page('manager-edit') || is_page('regular-order-list')) : ?>
    <a class="backToTop" href="<?php echo home_url(); ?>/manager/">トップページに戻る</a>
    <?php else : ?>
    <a class="backToTop" href="<?php echo home_url(); ?>">トップページに戻る</a>
    <?php endif; ?>
  </div>
</div><!-- end .mypageSidebar -->