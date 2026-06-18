<?php get_header(); ?>

<?php
$args = array(
  'txt01' => '白萩の',
  'txt02' => '花のかゆらぐ　',
  'txt03' => '月の下かげ',
  'dir' => get_stylesheet_directory_uri() . '/images/greeting',
  'file_name' => 'header_img',
);
get_template_part('template-parts/content-page-header', null, $args);
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="greetingSec sec">
  <div class="container">
    <h1 class="secTtl">はじめに</h1>

    <div class="txt__wrap">
      <p class="txt">
        一人の人間が亡くなるということは、言うまでもなく悲しい出来事です。それが望まない別れ方であれば、現世に残された者はその心の底に、消すことのできない声を抱き続けます。<br>
        故人のために尽くす道はいろいろあり得ると思います。差しあたっては葬式を立派にするということも一つでしょう。しかし同時に、葬式さえ立派にすればそれで事がすむというものでもないようにも思えます。というのも、故人のいまわの際における一番の心残りは別の部分にあるからです。<br>
        伝えたいことを言えなかった。この後悔をもって永遠の扉に隔てられてしまった人の悲しみに、私たちは歩み寄らなければなりません。そのために、唯一の架け橋になるのは思い出です。現世で出会い、時を分け合った宿縁。そのふしぎの力の由来するところへ、一歩一歩思いを傾けて降りていく。そこには今でも季節が巡り、彼の人の声と温もりが息づいています。<br>
        誰かに思い出されたとき、人ははじめて「存在した」ことになる。この事実を信じるならば、私たちにとっての死生は必ずしも終わりを意味しません。怖いのは死ではなく愛の不在でしょう。忘却こそ本当の意味での無であり、故人にとっての終わりなのです。<br>
        なぜ出会ったのか。理由も知らずに現世に生まれ、そして再びいのちの砂漠に還っていく私たち。二つの世界の交差点でめぐりあった生命は、またどこかで出会うのかもしれません。<br>
        だからこそ、物語を続けていこうではありませんか。消えていくことの中に美しさもある。その思い出をたどることで、私たちの歩みもまた星や草木のようにひそやかな光を放ち続けるでしょう。<br>
        二度と会えないということも、また奇跡なのです。
      </p>
    </div>
  </div>

  <div class="bg img__wrap">
    <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/greeting', 'greeting_bg.jpg', 'greeting_bg@2x.jpg'); ?> width="1920" height="1160" alt="">
  </div>
</section>

<?php get_footer();