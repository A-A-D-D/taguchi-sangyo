<?php get_header(); ?>

<?php get_template_part('template-parts/mv'); ?>

<section class="mainContent sec">
  <div class="container">
    <div class="inner">
      <div class="left img__wrap" data-aos="fade-right">
        <img <?php echo image_src_retina(get_stylesheet_directory_uri() . '/images/service', 'content_img.jpg', 'content_img@2x.jpg'); ?> width="500" alt="ご依頼内容">
      </div>
      <div class="right" data-aos="fade-up">
        <h1 class="ttl">ご依頼内容</h1>
        <p class="txt">
          別れ、お悔やみ、お詫び、御礼。<br>
          大切な人に言葉を残したいという場合にご相談ください。お客様のご要望に合わせてメッセージを再現いたします。<br>
          基本プラン：5万円（税込み）でインタビュー＋文章考案。<br>
          出張／代筆は別途料金となります。
        </p>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/bottom-content'); ?>

<?php get_footer();