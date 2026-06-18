<?php get_header(); ?>

<section class="lawSec sec">
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
      <li class="list01__item"><label>販売事業者名</label>
        <div class="list01__right">田口産業株式会社</div>
      </li>
      <li class="list01__item"><label>店舗運営責任者</label>
        <div class="list01__right">田口 将士郎</div>
      </li>
      <li class="list01__item"><label>所在地</label>
        <div class="list01__right">〒136-0082 東京都江東区新木場3丁目8番10号</div>
      </li>
      <li class="list01__item"><label>連絡先</label>
        <div class="list01__right">TEL：03-5569-7311</div>
      </li>
      <li class="list01__item"><label>代表電話番号</label>
        <div class="list01__right">03-5569-7311</div>
      </li>
      <li class="list01__item"><label>商品の販売価格</label>
        <div class="list01__right">商品価格は各商品画面に表示されます。</div>
      </li>
      <li class="list01__item"><label>支払い方法</label>
        <div class="list01__right">お支払方法は、各種クレジットカードとさせていただきます。</div>
      </li>
      <li class="list01__item"><label>商品の引渡し時期</label>
        <div class="list01__right">商品の出荷日は、各商品ページに記載されています。</div>
      </li>
      <li class="list01__item"><label>商品以外の費用</label>
        <div class="list01__right">消費税</div>
      </li>
      <li class="list01__item"><label>返品・キャンセルについて</label>
        <div class="list01__right">
          返品・交換及びキャンセルは、基本的に対応しておりません。<br>
          商品自体に問題がある場合のみ交換が可能です。
        </div>
      </li>
    </ul>

    <!-- <div class="lawSec__cont">
      <dl>
        <dt>販売事業者名</dt>
        <dd>株式会社A&amp;A</dd>
      </dl>
      <dl>
        <dt>店舗運営責任者</dt>
        <dd>中䑓光明</dd>
      </dl>
      <dl>
        <dt>所在地</dt>
        <dd>〒263-0024<br>千葉県千葉市稲毛区穴川3-10-1</dd>
      </dl>
      <dl>
        <dt>連絡先</dt>
        <dd>TEL：043-239-7422<br>MAIL：info@aa-group.co.jp</dd>
      </dl>
      <dl>
        <dt>商品の販売価格</dt>
        <dd>商品価格は各商品画面に表示されます。</dd>
      </dl>
      <dl>
        <dt>支払い方法</dt>
        <dd>お支払方法は、各種クレジットカードとさせていただきます。</dd>
      </dl>
      <dl>
        <dt>商品の引渡し時期</dt>
        <dd>商品購入完了時に送付されるメールに各商品のダウンロードURLが記載されています。</dd>
      </dl>
      <dl>
        <dt>商品以外の費用</dt>
        <dd>消費税</dd>
      </dl>
      <dl>
        <dt>返品・キャンセルについて</dt>
        <dd>返品・交換及びキャンセルは、基本的に対応しておりません。<br>商品自体に問題がある場合のみ交換が可能です。</dd>
      </dl>
    </div> -->

  </div>
</section>

<?php get_footer();