<?php get_header(); ?>

<section class="loginSec">
  <div class="container">
    <h1 class="ttl__layout01">ログイン</h1>

    <div class="form__wrap">
      <?php echo do_shortcode('[wpmem_form login redirect_to="/manager/"]'); ?>
      <!-- <a class="pass-reset" href="<?php echo home_url(); ?>/password-reset/">パスワードをお忘れですか？</a> -->
    </div>
    
    <div class="line"></div>
    
    <div class="registration">
      <p class="txt01">会員登録されていない方はこちら</p>
      <a class="btn__layout03" href="<?php echo home_url(); ?>/registration/">新規会員登録（無料）</a>
    </div>

  </div>
</section>

<?php get_footer();