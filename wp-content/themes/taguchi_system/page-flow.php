<?php get_header(); ?>

<?php get_template_part('template-parts/page-header'); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="flowSec sec">
  <div class="container">
    <ul class="list">
      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_01.jpg', 'step_img_01@2x.jpg'); ?> width="298" height="210" alt="お申込み">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">01</span><span class="num num--front absolute">01</span></span>
              <span class="txt">お申込み</span>
            </h2>
            <p class="item__txt">
              充電設備設置をお考えでしたら、まずはお問合せフォームまたはお電話にてお問い合わせください。<br>
              最初はお客様と打ち合わせを行い、お車の使用状況やライフスタイルを軽くヒアリングさせていただき、お客様に最適なプラン（設備・工事内容・工事費用）をご提案いたします。
            </p>
            <a href="<?php echo home_url(); ?>/contact/" class="btn01">工事のお問い合わせ・お申込み<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3.375,15.375a12,12,0,1,0,12-12A12,12,0,0,0,3.375,15.375Zm14.106,0L12.756,10.7a1.114,1.114,0,0,1,1.575-1.575l5.5,5.521a1.112,1.112,0,0,1,.035,1.535l-5.423,5.44a1.112,1.112,0,1,1-1.575-1.569Z" transform="translate(-3.375 -3.375)" fill="#fff"/></svg></a>
          </div>
        </div>
      </li>

      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_02.jpg', 'step_img_02@2x.jpg'); ?> width="298" height="210" alt="現地調査">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">02</span><span class="num num--front absolute">02</span></span>
              <span class="txt">現地調査</span>
            </h2>
            <p class="item__txt">
              お申し込み時のヒアリング内容も含めた上で現地調査を行い、配線ルート・設置場所の確認、工事内容のご説明をいたします。（所要時間：約1〜2時間）<br>
              設置場所などのご要望がございましたら、調査時にでもお声掛けいただければ、合わせて検討させていただきますので、遠慮なくお申し付けください。
            </p>
          </div>
        </div>
      </li>

      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_03.jpg', 'step_img_03@2x.jpg'); ?> width="298" height="210" alt="お見積り">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">03</span><span class="num num--front absolute">03</span></span>
              <span class="txt">お見積り</span>
            </h2>
            <p class="item__txt">
              工事内容の最終確認を行い、充電器・工事費用を含めたお見積書を提出いたします。<br>
              ※一戸建てに設置する場合、補助金申請が出来ないためご注意ください。
            </p>
          </div>
        </div>
      </li>

      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_04.jpg', 'step_img_04@2x.jpg'); ?> width="298" height="210" alt="ご契約">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">04</span><span class="num num--front absolute">04</span></span>
              <span class="txt">ご契約</span>
            </h2>
            <p class="item__txt">
              工事内容・最終お見積書共にご了承いただけましたら、ご契約書の取り交わしをし、工事日を決定します。合わせて事前準備の確認も行います。
            </p>
          </div>
        </div>
      </li>

      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_05.jpg', 'step_img_05@2x.jpg'); ?> width="298" height="210" alt="設置工事">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">05</span><span class="num num--front absolute">05</span></span>
              <span class="txt">設置工事</span>
            </h2>
            <p class="item__txt">
              屋内・屋外の配線工事及びコンセント設置を行います。（所要時間：約4時間〜）<br>
              充電設備の設置の際、作業の最後に15分ほど停電が発生しますので、予めご了承願います。<br>
              <br>
              <span class="red">－ 注意点 －</span><br>
              ※敷地や建物の状況などにより所定以上の時間がかかる場合があります。<br>
              ※屋内から屋外へ配線するときに、外壁を貫通する作業が発生する場合もあります。
            </p>
          </div>
        </div>
      </li>

      <li class="item relative" data-aos="fade">
        <div class="inner">
          <div class="img__wrap item__img">
            <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/flow', 'step_img_06.jpg', 'step_img_06@2x.jpg'); ?> width="298" height="210" alt="完了">
          </div>
          <div class="item__cont">
            <h2 class="item__ttl">
              <span class="step">step</span>
              <span class="num relative"><span class="num--back">06</span><span class="num num--front absolute">06</span></span>
              <span class="txt">完了</span>
            </h2>
            <p class="item__txt">
              工事が完了しましたら、通電確認と充電器の取扱などの説明をいたします。<br>
              問題がなければ、お支払いの手続きに進ませていただきます。<br>
              ※現金でのお支払いはお受けしかねます。設置完了後7日以内に銀行振込にてお支払いをお願いいたします。<br>
              設置後にトラブルが発生した場合でも、365日24時間受付いたしますので、お急ぎの方はこちらの電話番号までご連絡ください。（<span class="red tel">TEL:043−265-0855</span>）
            </p>
          </div>
        </div>
      </li>
    </ul>

  </div>
</section>

<?php get_footer();