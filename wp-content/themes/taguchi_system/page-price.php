<?php get_header(); ?>

<?php
$args = array(
  'txt01' => 'さしのぼる',
  'txt02' => '日かげのどけき　',
  'txt03' => '我こころかな',
  'dir' => get_stylesheet_directory_uri() . '/images/price',
  'file_name' => 'header_img',
);
get_template_part('template-parts/content-page-header', null, $args);
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="priceSec sec">
  <div class="container">
    <h1 class="secTtl">料金のご案内</h1>

    <div class="table">
      <div class="col col01">
        <div class="row row01">
          <p>プラン</p>
        </div>
        <div class="row row02">
          <p>費用</p>
        </div>
        <div class="row row03">
          <p>面談</p>
        </div>
        <div class="row row04">
          <p>取材</p>
        </div>
        <div class="row row05">
          <p>執筆</p>
        </div>
        <div class="row row06">
          <p>出張費用</p>
        </div>
      </div>

      <div class="col col02">
        <div class="row row01">
          <p class="label--sp">プラン</p>
          <p>4枚セット(第一章〜第四章)<br>約 14,000 字</p>
        </div>
        <div class="row row02">
          <p class="label--sp">費用</p>
          <p>165,000円</p>
        </div>
        <div class="row row03">
          <p class="label--sp">面談</p>
          <div class="circle"></div>
        </div>
        <div class="row row04">
          <p class="label--sp">取材</p>
          <div class="circle"></div>
        </div>
        <div class="row row05">
          <p class="label--sp">執筆</p>
          <div class="circle"></div>
        </div>
        <div class="row row06">
          <p class="label--sp">出張費用</p>
          <div class="line"></div>
        </div>
      </div>

      <div class="col col03">
        <div class="row row01">
          <p class="label--sp">プラン</p>
          <p>3枚セット(第一章〜第三章)<br>約 10,700 字</p>
        </div>
        <div class="row row02">
          <p class="label--sp">費用</p>
          <p>125,000円</p>
        </div>
        <div class="row row03">
          <p class="label--sp">面談</p>
          <div class="circle"></div>
        </div>
        <div class="row row04">
          <p class="label--sp">取材</p>
          <div class="circle"></div>
        </div>
        <div class="row row05">
          <p class="label--sp">執筆</p>
          <div class="circle"></div>
        </div>
        <div class="row row06">
          <p class="label--sp">出張費用</p>
          <div class="line"></div>
        </div>
      </div>

      <div class="col col04">
        <div class="row row01">
          <p class="label--sp">プラン</p>
          <p>2枚セット(第一章〜第二章)<br>約 6,600 字</p>
        </div>
        <div class="row row02">
          <p class="label--sp">費用</p>
          <p>85,000円</p>
        </div>
        <div class="row row03">
          <p class="label--sp">面談</p>
          <div class="circle"></div>
        </div>
        <div class="row row04">
          <p class="label--sp">取材</p>
          <div class="circle"></div>
        </div>
        <div class="row row05">
          <p class="label--sp">執筆</p>
          <div class="circle"></div>
        </div>
        <div class="row row06">
          <p class="label--sp">出張費用</p>
          <div class="line"></div>
        </div>
      </div>

      <div class="col col05">
        <div class="row row01">
          <p class="label--sp">プラン</p>
          <p>1枚セット(第一章)<br>約 2,900 字</p>
        </div>
        <div class="row row02">
          <p class="label--sp">費用</p>
          <p>45,000円</p>
        </div>
        <div class="row row03">
          <p class="label--sp">面談</p>
          <div class="circle"></div>
        </div>
        <div class="row row04">
          <p class="label--sp">取材</p>
          <div class="circle"></div>
        </div>
        <div class="row row05">
          <p class="label--sp">執筆</p>
          <div class="circle"></div>
        </div>
        <div class="row row06">
          <p class="label--sp">出張費用</p>
          <div class="line"></div>
        </div>
      </div>
    </div>
    <p class="taxTxt">※上記は税込み表示です</p>

    <div class="txt-img">
      <div class="txt__wrap">
        <ul>
          <li>目安の枚数については面談の上、ご提案させていただきます。</li>
          <li>ご相談はオンライン／対面どちらも可能です。</li>
          <li>対面（遠方）の場合は出張費用がかかります。</li>
          <li>制作期間は 3～4 週間が目安です。状況により遅れる場合があります。</li>
          <li>納品は PDF データでのお渡しとなります。</li>
          <li>印刷する場合は A3 サイズがおすすめです。</li>
          <li>お支払いは現金または振り込みでお願いしています。</li>
        </ul>
      </div>
      <div class="img__wrap">
        <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/price', 'price_newspaper.png', 'price_newspaper@2x.png'); ?> width="392" height="295" alt="">
      </div>
    </div>
  </div>
</section>

<?php
$args = array(
  'dir' => get_stylesheet_directory_uri() . '/images/price',
  'file_name' => 'bottom_img',
);
get_template_part('template-parts/bottom-img', null, $args);
?>

<?php get_footer();