<?php get_header(); ?>

<?php get_template_part('template-parts/page-header'); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="faqSec sec">
  <div class="container">
    <div class="tab tab01" data-aos="fade">
      <div class="tab__btn tab__btn--01 relative current">
        <span>工事<br class="hidden--pc">について</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10"><path d="M14.691,18.232l6.428-6.618a1.186,1.186,0,0,1,1.716,0,1.286,1.286,0,0,1,0,1.77l-7.283,7.5a1.188,1.188,0,0,1-1.675.036l-7.334-7.53a1.283,1.283,0,0,1,0-1.77,1.186,1.186,0,0,1,1.716,0Z" transform="translate(-6.188 -11.246)" fill="#6DB75A"/></svg>
      </div>
      <div class="tab__btn tab__btn--02 relative">
        <span>充電設備<br class="hidden--pc">について</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10"><path d="M14.691,18.232l6.428-6.618a1.186,1.186,0,0,1,1.716,0,1.286,1.286,0,0,1,0,1.77l-7.283,7.5a1.188,1.188,0,0,1-1.675.036l-7.334-7.53a1.283,1.283,0,0,1,0-1.77,1.186,1.186,0,0,1,1.716,0Z" transform="translate(-6.188 -11.246)" fill="#137ED5"/></svg>
      </div>
    </div>

    <div class="faq" data-aos="fade">
      <ul class="list list--01 tab__cont tab__cont--01 show">
        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">工事中は、常時立会いの必要はありますか？</p>
          <p class="answer">充電設備の取り付け位置確認と、工事完了確認の時は立ち会いをお願いしております。<br>
            それ以外の時間帯は立ち会いは不要ですが、屋内の分電盤の工事がございますので、ご在宅いただきますようお願いいたします。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">工事中は停電しますか？</p>
          <p class="answer">作業の最後に、家全体が15分ほど停電いたします。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">申込みから設置完了までどのくらいの日数がかかりますか？</p>
          <p class="answer">分電盤から、充電設備の設置場所までの経路に物が置いてある場合は、ご移動いただけますと幸いです。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">現地調査日までに、準備することなどはございますか？</p>
          <p class="answer">当社が申込を受付後、工事完了までの期間は約2〜3週間を目処にしております。<br>
            ただし、お客様の建物・敷地の状況や、電力容量アップに伴う電力会社への申請が必要な場合などは、時間を要する場合もございます。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">設置場所調査、および設置に要する時間はどれくらいですか？</p>
          <p class="answer">設置場所調査に約1〜2時間、設置に約4時間30分〜約6時間30分を要します。<br>
            設置の間はご在宅いただきますようお願いいたします。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">補助金の利用は可能ですか？</p>
          <p class="answer">個人用の充電設備でも、条件を満たせば導入費用に対して国から補助金が出ますが、マンションやアパートなどの共同住宅に住んでいる方に向けた補助金なので、戸建て住宅に住んでいる方は補助金対象外となりますのでご注意ください。</p>
        </li>
      </ul>

      <ul class="list list--02 tab__cont tab__cont--02">
        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">充電時間はどれくらいですか？</p>
          <p class="answer">EVの搭載バッテリー容量と充電時の残容量にもよりますが、一般的に急速充電は30分から1時間で電池の80％まで充電、普通充電は8時間から12時間以上かけて100%まで充電されます。<br>
            搭載バッテリー容量は各自動車メーカーのホームページなどでご確認ください。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">急速充電器と普通充電器の充電口は同じですか？</p>
          <p class="answer">いいえ、急速充電器と普通充電器のコネクタは形状が異なりますので、間違って挿すことはありませんのでご安心ください。</p>
        </li>

        <li class="item relative">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon.svg" media="(min-width: 992px)">
            <img class="icon absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq/faq_icon_sp.svg" alt="質問">
          </picture>
          <p class="question">充電器の耐用年数はどのくらいですか？</p>
          <p class="answer">急速充電器、普通充電器とも8年程度です。ただし、設置環境や利用状況により耐用年数は大きく変わります。海に近い塩害地域や温泉地などでの雰囲気ガスでは錆や劣化の進行が早くなります。また、不特定多数の利用者が多い商業施設等では充電ケーブルの損傷なども起こりやすい傾向にあります。</p>
        </li>
      </ul>
    </div>

  </div>
</section>

<?php get_footer();