<?php get_header(); ?>

<div class="pageHeader relative img__wrap">
  <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/mypage', 'page_header_img.jpg', 'page_header_img@2x.jpg'); ?> width="1920" height="500" alt="">
</div>

<section class="mypageSec sec">
  <div class="container">
    <p class="txt01">ようこそ テストユーザー さん</p>

    <h2 class="mypage__ttl">会員メニュー</h2>

    <ul class="list">
      <li class="item">
        <a href="">送信フォーム<i class="fa-solid fa-angle-right"></i></a>
      </li>
      <li class="item">
        <a href="">登録内容の変更<i class="fa-solid fa-angle-right"></i></a>
      </li>
      <li class="item">
        <a href="">ログアウト<i class="fa-solid fa-angle-right"></i></a>
      </li>
    </ul>
  </div>
</section>




<?php get_footer();