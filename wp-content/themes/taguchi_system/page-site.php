<?php //manager_only_page(); ?>

<?php get_header(); ?>

<div class="mypage_layout">
  <?php get_template_part('sidebar', 'mypage'); ?>

  <div class="mypageMain">
    <section class="siteSec sec">
      <h1 class="ttl">
        <?php
        if($headline = get_field('headline')) {
          echo $headline;
        } else {
          echo get_the_title();
        }
        ?>
      </h1>

      <?php
      $user = wp_get_current_user();

      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1 );

      $args = array(
        'post_type'      => 'site_post',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'paged'          => $paged,
        'meta_query' => array(
          array(
              'key' => 'user',
              'value' => $user->ID,
              'compare' => '=',
          )
          ),
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : ?>
        <div class="site__table">
          <dl class="table__head">
            <dt class="site_name">現場名</dt>
            <dd class="address">現場住所</dd>
            <dd class="contact">連絡先</dd>
            <dd class="vehicle_restrictions">車輌規制の有無</dd>
            <dd class="delete"></dd>
          </dl>
        <?php while ($query->have_posts()) : $query->the_post();
          $site_name = get_field('site_name');
          $postcode = get_field('postcode');
          $address = get_field('address_1') . get_field('address_2');
          $contact_1 = get_field('contact_1');
          $contact_2 = get_field('contact_2');
          $contact_3 = get_field('contact_3');
          $vehicle_restrictions = get_field('vehicle_restrictions');
          $restriction_type = get_field('restriction_type'); //[value, label]
          $other_text = get_field('other_text');

          $contact_text = '①'.$contact_1;
          if($contact_2) {
            $contact_text .= '<br>②'.$contact_2;
          }
          if($contact_3) {
            $contact_text .= '<br>③'.$contact_3;
          }

          $vehicle_restrictions_text = '';
          if(!$vehicle_restrictions) {
            $vehicle_restrictions_text = '無し';
          } else {
            if($restriction_type['value'] == 'other') {
              $vehicle_restrictions_text = 'その他';
              if($other_text) {
                $vehicle_restrictions_text .= '：'.$other_text;
              }
            } elseif($restriction_type['value'] == 'unselected') {
              $vehicle_restrictions_text = '有り';
            } else {
              $vehicle_restrictions_text = '有り：'.$restriction_type['label'];
            }
          }

          $nonce = wp_create_nonce('delete_site_post_' . $post->ID);
        ?>
          <dl class="table__row">
            <dt class="site_name"><?php echo $site_name; ?></dt>
            <dd class="address"><?php echo '〒'.$postcode.' '.$address; ?></dd>
            <dd class="contact"><?php echo $contact_text; ?></dd>
            <dd class="vehicle_restrictions"><?php echo $vehicle_restrictions_text; ?></dd>
            <dd class="delete">
              <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" onsubmit="return confirm('本当に削除しますか？');">
                <input type="hidden" name="action" value="delete_site_post">
                <input type="hidden" name="post_id" value="<?php echo esc_attr($post->ID); ?>">
                <input type="hidden" name="_wpnonce" value="<?php echo esc_attr($nonce); ?>">
                <button type="submit">削除</button>
              </form>
            </dd>
          </dl>
        <?php endwhile; ?>
        </div>

        <div class="pagination">
          <?php
          // ページネーションを表示
          echo paginate_links(array(
              'total'   => $query->max_num_pages,
              'current' => $paged,
          ));
          ?>
        </div>
        <?php

        wp_reset_postdata();
      else :
        echo '<p>現場の登録がありません。</p>';
      endif;
      ?>

      <a class="siteAddBtn" href="<?php echo home_url(); ?>/site-add/"><i class="fa-solid fa-plus"></i><span>現場を追加する</span></a>

    </section>
  </div><!-- end .mypageMain -->
</div>

<?php get_footer();