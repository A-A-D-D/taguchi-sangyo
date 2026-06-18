<?php get_header(); ?>

<section class="companySec sec">
	<div class="container">

    <h1 class="ttl__layout01">
      <?php
      if(get_field('headline')) {
        echo get_field('headline');
      } else {
        echo get_the_title();
      }
      ?>
    </h1>

    <ul class="list01">
      <li class="list01__item"><label>社　名</label>
        <div class="list01__right">田口産業株式会社</div>
      </li>
      <li class="list01__item"><label>所在地</label>
        <div class="list01__right">
          本店所在地<br>
          〒136-0082 東京都江東区新木場3丁目8番10号<br>
          <br>
          支店所在地<br>
          〒262-0007 千葉県千葉市花見川区み春野
        </div>
      </li>
      <li class="list01__item"><label>代表者</label>
        <div class="list01__right">代表取締役 田口 将士郎</div>
      </li>
      <li class="list01__item"><label>設　立</label>
        <div class="list01__right">1988/08/01</div>
      </li>
      <li class="list01__item"><label>代表電話番号</label>
        <div class="list01__right">03-5569-7311</div>
      </li>
      <li class="list01__item"><label>業種</label>
        <div class="list01__right">
          卸売業，小売業 ＞ その他の各種商品小売業（従業者が常時50人未満のもの）
        </div>
      </li>
    </ul>
  </div>
</section>

<?php get_footer();