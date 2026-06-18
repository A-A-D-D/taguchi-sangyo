<?php //manager_only_page(); ?>

<?php get_header(); ?>

<div class="mypage_layout">
  <?php get_template_part('sidebar', 'mypage'); ?>

  <div class="mypageMain">
    <section class="profileSec sec">
      <h1 class="ttl">
        <?php
        if($headline = get_field('headline')) {
          echo $headline;
        } else {
          echo get_the_title();
        }
        ?>
      </h1>

      <?php $user = wp_get_current_user(); ?>
      <div class="userInfo__table">
        <dl>
          <dt>ID</dt>
          <dd>
            <span class="data"><?php echo $user->user_login; ?></span>
          </dd>
        </dl>
        <dl>
          <dt>会社名 または 屋号</dt>
          <dd>
            <span class="data"><?php echo get_user_meta($user->ID, 'company_name', true); ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>業種</dt>
          <dd>
            <?php
            $value = get_user_meta($user->ID, 'gyoshu', true);
            $label = get_wpmem_label_from_value( 'gyoshu', $value );
            ?>
            <span class="data"><?php echo $label; ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>会社住所</dt>
          <dd>
            <span class="data">〒<?php echo get_user_meta($user->ID, 'billing_postcode', true) . ' ' . get_user_meta($user->ID, 'company_address', true); ?></span>
          </dd>
        </dl>
        <dl>
          <dt>担当者名</dt>
          <dd>
            <span class="data"><?php echo get_user_meta($user->ID, 'last_name', true) . ' ' . get_user_meta($user->ID, 'first_name', true); ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>性別</dt>
          <dd>
            <?php
            $value = get_user_meta($user->ID, 'gender', true);
            $label = get_wpmem_label_from_value( 'gender', $value );
            ?>
            <span class="data"><?php echo $label; ?></span>
          </dd>
        </dl>
        <dl>
          <dt>携帯番号</dt>
          <dd>
            <span class="data"><?php echo get_not_required_field($user->ID, 'mobile'); ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>固定電話</dt>
          <dd>
            <span class="data"><?php echo get_not_required_field($user->ID, 'tel'); ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>FAX</dt>
          <dd>
            <span class="data"><?php echo get_not_required_field($user->ID, 'fax'); ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>メールアドレス</dt>
          <dd>
            <span class="data"><?php echo $user->user_email; ?></span>
            <a class="editBtn" href="<?php echo home_url(); ?>/profile-edit/">変更</a>
          </dd>
        </dl>
        <dl>
          <dt>パスワード</dt>
          <dd>
            <span class="data">******</span>
          </dd>
        </dl>
      </div>
    </section>
  </div><!-- end .mypageMain -->
</div>

<?php get_footer();