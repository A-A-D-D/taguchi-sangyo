<?php get_header(); ?>

<?php get_template_part('template-parts/page-header'); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="aboutSec sec relative">
  <div class="container">
    <h2 class="secTtl02" data-aos="fade">次世代カーライフへの<br class="hidden--pc">カウントダウン</h2>
    <p class="txt" data-aos="fade">
      普通の暮らしの中で、誰もが普通に”電気自動車”に乗る。<br>
      そして、必要な時に必要なだけ、<span class="marker">自由にEV充電ができる</span><br class="hidden--sp">そんな日常がいよいよやってきます。<br>
      世界に比べると、日本のEV車普及率はまだまだ低いですが、2050年カーボンニュートラル<br class="hidden--sp">実現に向けて、<span class="marker">次世代カーライフの未来</span>はすぐそばまで来ています。
    </p>
    <div class="imageArea">
      <div class="img__wrap" data-aos="fade">
        <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'about_img_01.jpg', 'about_img_01@2x.jpg'); ?> width="460" height="310" alt="">
      </div>
      <div class="img__wrap" data-aos="fade">
        <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'about_img_02.jpg', 'about_img_02@2x.jpg'); ?> width="395" height="264" alt="">
      </div>
    </div>
  </div>
  <div class="city img__wrap">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/city.svg" alt="">
  </div>
</section>

<section class="meritSec sec">
  <div class="container">
    <p class="secTtl01--en">merit</p>
    <h2 class="secTtl01">自宅に充電設備を設置するメリット</h2>

    <ul class="list">
      <li class="item" data-aos="fade-right">
        <p class="num marker">merit<span>01</span></p>
        <div class="imgArea">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/merit_img1.svg" alt="寝ている間に充電完了">
        </div>
        <h3 class="ttl"><span>寝ている間</span>に充電完了</h3>
        <p class="txt">「電気自動車は充電に時間がかかる」というイメージをお持ちの方も少なくないでしょう。自宅での充電であれば寝ている間に充電は完了します。スマホの充電と同じ感覚です。</p>
      </li>
      <li class="item" data-aos="fade-left">
        <p class="num marker">merit<span>02</span></p>
        <div class="imgArea">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/merit_img2.svg" alt="自分専用のため順番待ちの必要なし">
        </div>
        <h3 class="ttl"><span>自分専用</span>のため<br class="hidden--pc">順番待ちの必要なし</h3>
        <p class="txt">ご自宅での充電設備は、自分専用なので、順番待ちの心配はありません。充電そのものを待っている時間、充電器の順番待ちの時間がかからないため、より快適な電気自動車ライフが可能です。</p>
      </li>
      <li class="item" data-aos="fade-right">
        <p class="num marker">merit<span>03</span></p>
        <div class="imgArea">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/merit_img3.svg" alt="充電費用を安く出来る可能性がある">
        </div>
        <h3 class="ttl">充電費用を<span>安く</span>出来る<br class="hidden--pc">可能性がある</h3>
        <p class="txt">走行コストで比較すると、実はガソリン車よりもEV車の方が圧倒的にコストが低いと言われています。電気料金プランや充電時間帯にもよって費用の変動はありますが、気になる方はお気軽にご相談ください。</p>
      </li>
      <li class="item" data-aos="fade-left">
        <p class="num marker">merit<span>04</span></p>
        <div class="imgArea">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/merit_img4.svg" alt="給油のためだけに外出する必要なし">
        </div>
        <h3 class="ttl">給油のためだけに<br class="hidden--pc"><span>外出する必要なし</span></h3>
        <p class="txt">お住まいの地域によってはステーションが遠く、ご不便なこともあるかと思います。自宅に充電設備を設置していれば、給油のためにわざわざ外出する必要もなくなります。</p>
      </li>
    </ul>
  </div>
</section>

<section class="systemSec sec">
  <div class="container">
    <p class="secTtl01--en">system</p>
    <h2 class="secTtl01">充電設備設置工事の仕組み</h2>

    <div class="box">
      <p class="desc" data-aos="fade">専用の充電器をご自宅に設置するために、<span>配管･配線</span>などの電気工事が必要となります。</p>
      <div class="img__wrap" data-aos="fade">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/system_illust.svg" alt="">
      </div>
      <ul class="list">
        <li class="item" data-aos="fade-right">
          <div class="num">1</div>
          <p class="txt">既存分電盤改造（ブレーカー増設等）</p>
        </li>
        <li class="item" data-aos="fade-right">
          <div class="num">2</div>
          <p class="txt">分電盤新設</p>
        </li>
        <li class="item" data-aos="fade-right">
          <div class="num">3</div>
          <p class="txt">電線／電線管敷設</p>
        </li>
        <li class="item" data-aos="fade-right">
          <div class="num">4</div>
          <p class="txt">コンクリート基礎設置・充電器固定（ボルト固定）</p>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="seriesSec sec">
  <div class="container">
    <p class="secTtl01--en">Series</p>
    <h2 class="secTtl01">充電設備機器の種類</h2>

    <div class="type relative">
      <h3 class="type__ttl" data-aos="fade">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/plug_icon.svg" alt="">コンセントタイプ
      </h3>

      <div class="box" data-aos="fade-up">
        <div class="img__wrap">
          <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'plug_A.jpg', 'plug_A@2x.jpg'); ?> width="300" height="230" alt="">
        </div>
        <div class="txt__wrap">
          <p class="name">コンセント（パナソニック社製）</p>
          <p class="txt">
            カラーバリエーションが豊富で、壁面取付のコンセントタイプです。<br>
            設置スペースが限られる方にもご好評いただいている他、片手でプラグの挿抜が可能な高い操作性も魅力の一つです。<br>
            見た目も、コストもシンプルにされたい方に特におすすめの商品です。
          </p>
          <p class="annotation">
            ※工事価格は、設置場所などによっても異なるため、現地調査後に正式なお見積書を提出させていただきます。
          </p>
        </div>
      </div>
      <div class="box" data-aos="fade-up">
        <div class="img__wrap">
          <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'plug_B.jpg', 'plug_B@2x.jpg'); ?> width="300" height="230" alt="">
        </div>
        <div class="txt__wrap">
          <p class="name">収納付きコンセント（パナソニック社製）</p>
          <p class="txt">
            充電ケーブルを、フックにかけて収納できる便利なコンセントタイプです。<br>
            保護カバーを閉め、簡易鍵を施錠すれば、コンセントの差込み口や充電中のケーブルへのいたずら防止にも効果があります。（オプションで、タイマースイッチも装着可能です。）<br>
            見た目も、コストもシンプルにされたい方に特におすすめの商品です。
          </p>
          <p class="annotation">
            ※工事価格は、設置場所などによっても異なるため現地調査後に正式なお見積書を提出させていただきます。
          </p>
        </div>
      </div>

      <div data-aos="fade-right">
        <a href="<?php echo home_url(); ?>/contact/" class="btn02">見積りを申し込む<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3.375,15.375a12,12,0,1,0,12-12A12,12,0,0,0,3.375,15.375Zm14.106,0L12.756,10.7a1.114,1.114,0,0,1,1.575-1.575l5.5,5.521a1.112,1.112,0,0,1,.035,1.535l-5.423,5.44a1.112,1.112,0,1,1-1.575-1.569Z" transform="translate(-3.375 -3.375)" fill="#fff"/></svg></a>
      </div>

      <img class="type__illust absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/plug_illust.svg" alt="">
    </div>

    <div class="type relative">
      <h3 class="type__ttl" data-aos="fade">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/cable_icon.svg" alt="">充電器（ケーブルタイプ）
      </h3>

      <div class="box" data-aos="fade-up">
        <div class="img__wrap">
          <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'cable_A.jpg', 'cable_A@2x.jpg'); ?> width="300" height="230" alt="">
        </div>
        <div class="txt__wrap">
          <p class="name">壁掛型充電器（パナソニック社製 mode3）</p>
          <p class="txt">
            充電器の付属ケーブルを使用する壁掛型の充電器です。（壁面取付とスタンド取付が可能）<br>
            自由度の高い位置や、利便性の高さが魅力です。<br>
            素早く、手軽に充電したい方に特におすすめの商品です。
          </p>
          <p class="annotation">
            ※工事価格は、設置場所などによっても異なるため、現地調査後に正式なお見積書を提出させていただきます。
          </p>
        </div>
      </div>
      <div class="box" data-aos="fade-up">
        <div class="img__wrap">
          <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/about', 'cable_B.jpg', 'cable_B@2x.jpg'); ?> width="300" height="230" alt="">
        </div>
        <div class="txt__wrap">
          <p class="name">自立式スタンドポール（パナソニック社製 mode3）</p>
          <p class="txt">
            充電器の付属ケーブルを使用する壁掛型の充電器です。<br>
            スタンドポールは自立式のため、別途工事が発生するオプション商品になります。<br>
            建物から離れた駐車場へ充電器を設置する際におすすめの商品です。
          </p>
          <p class="annotation">
            ※工事価格は、設置場所などによっても異なるため現地調査後に正式なお見積書を提出させていただきます。
          </p>
        </div>
      </div>

      <div data-aos="fade-right">
        <a href="<?php echo home_url(); ?>/contact/" class="btn02">見積りを申し込む<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3.375,15.375a12,12,0,1,0,12-12A12,12,0,0,0,3.375,15.375Zm14.106,0L12.756,10.7a1.114,1.114,0,0,1,1.575-1.575l5.5,5.521a1.112,1.112,0,0,1,.035,1.535l-5.423,5.44a1.112,1.112,0,1,1-1.575-1.569Z" transform="translate(-3.375 -3.375)" fill="#fff"/></svg></a>
      </div>

      <img class="type__illust absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/cable_illust.svg" alt="">
    </div>

    <div class="option relative" data-aos="fade">
      <h3 class="ttl01 relative">OPTION MENU</h3>
      <p class="ttl02">追加工事</p>
      <div class="list">
        <div class="item__wrap">
          <p class="item">＊主開閉器の交換</p>
          <p class="item">＊分電盤の交換</p>
          <p class="item">＊開閉器の増設</p>
        </div>
        <div class="item__wrap">
          <p class="item">＊特殊な構造壁貫通</p>
          <p class="item">＊幹線の張り替え</p>
          <p class="item">＊非常用回路分岐盤</p>
        </div>
        <div class="item__wrap">
          <p class="item">＊追加配線（1mごと）</p>
          <p class="item">＊アース線の敷設（特殊工事）</p>
          <p class="item">＊設置後電力会社検査立会い</p>
        </div>
      </div>
      <p class="txt">現地調査の結果、上記の作業等が必要となった場合、別途オプション料金が発生する可能性がございますので、予めご了承ください。（家屋の状況により金額が異なる場合があります）</p>
      <img class="illust illust01 absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/ruler_img.svg" alt="">
      <img class="illust illust02 absolute" src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/pliers_img.svg" alt="">
    </div>
  </div>
</section>

<?php get_footer();