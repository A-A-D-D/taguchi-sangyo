<?php //manager_only_page(); ?>

<?php get_header(); ?>

<div class="mypage_layout">
  <?php get_template_part('sidebar', 'mypage'); ?>

  <div class="mypageMain">
    <section class="regular-order-listSec sec">
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
      $query = new WC_Order_Query( array(
        'limit' => -1,
      ) );
      $orders = $query->get_orders();
      if(!empty($orders)) :
      ?>
      <div class="regularOrder__tableWrap">
        <table class="regularOrder__table">
          <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">名前</th>
            <th rowspan="2">発注日</th>
            <th>品番</th>
            <th>お届け希望日</th>
            <th>現場名</th>
            <th rowspan="2">注文個数</th>
            <th rowspan="2">購入金額<br>（送料含む）</th>
          </tr>
          <tr>
            <th>商品名</th>
            <th>受取希望時間帯</th>
            <th>現場住所</th>
          </tr>
  
          <?php
          $num = 1;
          foreach($orders as $order) {
            $name = $order->get_billing_last_name() . ' ' . $order->get_billing_first_name();
            $total = $order->get_total();
            $date = $order->get_date_created()->date('Y/n/j');
            $shipping_date = $order->get_meta('shipping_date');
            $shipping_time = $order->get_meta('shipping_time');
            $location = '-';
            $address = '〒' . $order->get_shipping_postcode() . ' ' .
                        get_pref_name($order->get_shipping_state()) . 
                        $order->get_shipping_city() . 
                        $order->get_shipping_address_1() . ' ' . 
                        $order->get_shipping_address_2();
            $items = $order->get_items('line_item');
            $count = count($items);
            $max_row_index = $count * 2;
            $row_index = 1;
            foreach($items as $item) {
              $product_id = $item['product_id'];
              $product = wc_get_product($product_id);
              $sku = $product->get_sku();
              $quantity = $item['quantity'];
              $product_name = $item['name'];
              echo '<tr>';
              if($row_index == 1) {
                echo '<td class="center" rowspan="' . $max_row_index . '">' . $num . '</td>';
                echo '<td rowspan="' . $max_row_index . '">' . $name . '</td>';
              }
              echo '<td class="center" rowspan="2">' . $date . '</td>';
              echo '<td>' . $sku . '</td>';
              echo '<td class="center">' . $shipping_date . '</td>';
              echo '<td>' . $location . '</td>';
              echo '<td class="center" rowspan="2">' . $quantity . '</td>';
              if($row_index == 1) {
                echo '<td class="center" rowspan="' . $max_row_index . '">' . '¥' . number_format($total) . '<span class="taxin">(税込)</span></td>';
              }
              echo '</tr>';
              $row_index++;
              echo '<tr>';
              echo '<td>' . $product_name . '</td>';
              echo '<td class="center">' . $shipping_time . '</td>';
              echo '<td>' . $address . '</td>';
              echo '</tr>';
              $row_index++;
            }
            $num++;
          }
          ?>
        </table>
      </div>
      <?php else : ?>
        <p>注文が見つかりませんでした</p>
      <?php endif; ?>

    </section>
  </div><!-- end .mypageMain -->
</div>

<?php get_footer();