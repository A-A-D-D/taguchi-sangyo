<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(is_front_page()) : ?>
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php else : ?>
    <title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title>
    <?php endif; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon.png">

    <!-- <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/Yu Mincho Medium.woff2" as="font" type="font/woff2" crossorigin> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <script type="text/javascript">
      var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>

    <header class="header">
      <div class="header__inner">
        <div class="logo__wrap">
          <?php if(is_home() || is_front_page()) : ?>
            <h1 class="logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
          <?php else : ?>
            <p class="logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></p>
          <?php endif; ?>
        </div>

        <div class="header__menu">
          <ul class="list">
            <?php if(is_user_logged_in()) : ?>
              <?php if(!current_user_can('shop_manager')) : ?>
                <!-- マイページ、カート-->
                <li class="item profile">
                  <a href="<?php echo home_url(); ?>/profile/"><i class="fa-solid fa-user"></i><span>マイページ</span></a>
                </li>
                <li class="item cart">
                  <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                  <a href="<?php echo home_url(); ?>/cart/"><i class="fa-solid fa-bag-shopping fa-fw"><span class="count"><?php echo $cart_count ?></span></i><span>一般注文カート</span></a>
                </li>
              <?php endif; ?>
            <?php else : ?>
              <!-- ログイン -->
              <li class="item login">
                <a href="<?php echo home_url(); ?>/login/"><i class="fa-solid fa-right-to-bracket fa-fw"></i><span>ログイン</span></a>
              </li>
            <?php endif; ?>
          </ul>
        </div>

        <?php if(is_page('manager') || is_page('manager-edit') || is_page('regular-order-list/')) : ?>
        <div class="burgerMenu">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <?php endif; ?>

        <!-- <div class="header__menu" style="display: none;">
          <ul class="list">
            <li class="item">
              <a class="<?php if(get_post_field('post_name', get_the_ID()) == 'about') echo 'current'; ?>" href="<?php echo home_url(); ?>/about/">工事･製品について</a>
            </li>
            <li class="item">
              <a class="<?php if(get_post_field('post_name', get_the_ID()) == 'strength') echo 'current'; ?>" href="<?php echo home_url(); ?>/strength/">当社の強み</a>
            </li>
            <li class="item">
              <a class="<?php if(get_post_field('post_name', get_the_ID()) == 'flow') echo 'current'; ?>" href="<?php echo home_url(); ?>/flow/">工事の流れ</a>
            </li>
            <li class="item">
              <a class="<?php if(get_post_field('post_name', get_the_ID()) == 'faq') echo 'current'; ?>" href="<?php echo home_url(); ?>/faq/">よくある質問</a>
            </li>
            <li class="item">
              <a class="<?php if(get_post_field('post_name', get_the_ID()) == 'company') echo 'current'; ?>" href="<?php echo home_url(); ?>/company/">会社概要</a>
            </li>
          </ul>
          <a class="header__menuContact" href="<?php echo home_url(); ?>/contact/"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="17" viewBox="0 0 24 17"><defs><clipPath id="a"><rect width="24" height="17" fill="#6db75a" stroke="#fff" stroke-width="1.5"/></clipPath></defs><g clip-path="url(#a)"><path d="M3.956,0h14.4a3.955,3.955,0,0,1,3.955,3.955v7.359a3.955,3.955,0,0,1-3.955,3.955H3.956A3.956,3.956,0,0,1,0,11.313V3.956A3.956,3.956,0,0,1,3.956,0Z" transform="translate(0.464 0.866)" fill="#6db75a"/><path d="M3.956-.75h14.4a4.71,4.71,0,0,1,4.7,4.705v7.359a4.71,4.71,0,0,1-4.7,4.705H3.956A4.711,4.711,0,0,1-.75,11.313V3.956A4.711,4.711,0,0,1,3.956-.75Zm14.4,15.269a3.209,3.209,0,0,0,3.2-3.2V3.955a3.209,3.209,0,0,0-3.2-3.2H3.956A3.21,3.21,0,0,0,.75,3.956v7.357a3.21,3.21,0,0,0,3.206,3.206Z" transform="translate(0.464 0.866)" fill="#fff"/><path d="M3.331,3.255l7.12,6.388,1.767,1.585a1.957,1.957,0,0,0,2.592,0l1.767-1.585L23.7,3.255" transform="translate(-1.94 -0.885)" fill="#6db75a"/><path d="M13.514,12.464a2.686,2.686,0,0,1-1.8-.678L2.83,3.813l1-1.117,8.887,7.973a1.2,1.2,0,0,0,1.59,0L23.2,2.7l1,1.117-8.887,7.973A2.686,2.686,0,0,1,13.514,12.464Z" transform="translate(-1.94 -0.885)" fill="#fff"/><path d="M.538,7.184-.538,6.139,5.931-.523,7.007.523Z" transform="translate(2.318 8.499)" fill="#fff"/><path d="M6.039,7.188-.534.527.534-.527,7.107,6.135Z" transform="translate(15.213 8.499)" fill="#fff"/></g></svg>お問い合わせ</a>
        </div -->
      </div>
    </header>

    <?php
    if(is_page()) {
      $type = 'page';
    } elseif(is_single()) {
      $type = 'single';
    } elseif(is_archive() || is_post_type_archive() || is_category() || is_tag() || is_tax()) {
      $type = 'archive';
    } else {
      $type = '';
    }

    if(get_post(get_the_ID())) {
      $slug = get_post(get_the_ID())->post_name;
    } else {
      $slug = '';
    }
    ?>

    <main id="<?php echo is_home() ? 'topPage' : 'innerPage'; ?>" class="main <?php if($type != '' && $slug != '') echo $type . '-' . $slug; ?>">