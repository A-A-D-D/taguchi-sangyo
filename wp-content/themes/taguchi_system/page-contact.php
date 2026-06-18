<?php get_header(); ?>

<?php get_template_part('template-parts/page-header'); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="contactSec sec">
  <div class="container">
    <div class="tab tab02" data-aos="fade">
      <div class="tab__btn tab__btn--01 relative current">
        <span>見積り依頼フォーム</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10"><path d="M14.691,18.232l6.428-6.618a1.186,1.186,0,0,1,1.716,0,1.286,1.286,0,0,1,0,1.77l-7.283,7.5a1.188,1.188,0,0,1-1.675.036l-7.334-7.53a1.283,1.283,0,0,1,0-1.77,1.186,1.186,0,0,1,1.716,0Z" transform="translate(-6.188 -11.246)" fill="#6DB75A"/></svg>
      </div>
      <div class="tab__btn tab__btn--02 relative">
        <span>WEBからのお問い合わせ</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10"><path d="M14.691,18.232l6.428-6.618a1.186,1.186,0,0,1,1.716,0,1.286,1.286,0,0,1,0,1.77l-7.283,7.5a1.188,1.188,0,0,1-1.675.036l-7.334-7.53a1.283,1.283,0,0,1,0-1.77,1.186,1.186,0,0,1,1.716,0Z" transform="translate(-6.188 -11.246)" fill="#137ED5"/></svg>
      </div>
      <a class="tab__btn tab__btn--03 relative tel" href="#tel">
        <span>お電話でのお問い合わせ</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10"><path d="M14.691,18.232l6.428-6.618a1.186,1.186,0,0,1,1.716,0,1.286,1.286,0,0,1,0,1.77l-7.283,7.5a1.188,1.188,0,0,1-1.675.036l-7.334-7.53a1.283,1.283,0,0,1,0-1.77,1.186,1.186,0,0,1,1.716,0Z" transform="translate(-6.188 -11.246)" fill="#F4CB02"/></svg>
      </a>
    </div>

    <div class="contactForm" data-aos="fade">
      <div class="tab__cont tab__cont--01 show">
        <h2 class="secTtl02">見積り依頼フォーム</h2>
        <?php echo do_shortcode('[mwform_formkey key="36"]'); ?>
      </div>

      <div class="tab__cont tab__cont--02">
        <h2 class="secTtl02">WEBからのお問い合わせ</h2>
        <?php echo do_shortcode('[mwform_formkey key="39"]'); ?>
      </div>
    </div>
  </div>
</section>

<section id="tel" class="telSec sec">
  <div class="container">
    <h2 class="secTtl02">お電話でのお問い合わせ</h2>

    <div class="box">
      <img class="troubleTxt" src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact/trouble.svg" alt="トラブルは365日24時間受付中">
      <div class="wrap">
        <a href="tel:043-265-0855">
          <svg id="_レイヤー_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.38 55"><defs><style>.cls-1{fill:#383838;}</style></defs><g id="_レイヤー_1-2"><path id="_パス_5" class="cls-1" d="m57.17,4.68C50.7,1.65,43.05,0,33.19,0S15.68,1.65,9.21,4.68C2.62,7.76.05,12.14,0,17.65c.06,3.6,1.18,7.11,3.24,10.07l13.41-6.96c-.79-1.44-3.31-7.31-3.31-7.31-.56-1.31-.37-1.99.71-2.24,6.28-1.38,12.7-2.02,19.13-1.93,6.43-.1,12.85.55,19.13,1.93,1.08.26,1.26.93.71,2.24,0,0-2.51,5.87-3.31,7.31l13.41,6.96c2.06-2.96,3.19-6.46,3.24-10.07-.05-5.5-2.62-9.88-9.21-12.96"/><path id="_パス_6" class="cls-1" d="m53.1,30.13c-7.97-6.65-7.08-10.52-7.08-16.67h-7.03l-.05,6.51h-11.58l-.05-6.51h-7.03c0,6.16.89,10.02-7.08,16.67-7.97,6.65-6.13,19.36-3.51,24.87h46.92c2.62-5.51,4.45-18.22-3.51-24.87m-19.95,18.7c-6.18.03-11.21-4.96-11.23-11.13s4.96-11.21,11.13-11.23c6.18-.03,11.21,4.96,11.23,11.13,0,.02,0,.03,0,.05.01,6.16-4.97,11.17-11.13,11.19,0,0,0,0,0,0"/></g></svg>
          <span>043-265-0855</span>
        </a>
        <p>受付時間：平日9:00〜18:00</p>
      </div>
    </div>
  </div>
</section>

<?php get_footer();