<?php get_header(); ?>

<section class="categorySec sec">
  <div class="container container--1000">
    <h2 class="ttl">CATEGORY</h2>
    <?php
    $terms = get_terms('product_cat', array('hide_empty' => false));
    if($terms) :
    ?>
    <ul class="list">
      <?php foreach($terms as $term) : ?>
      <li class="item">
        <a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  </div>
</section>

<section class="productsSec sec">
  <div class="container container--1000">
    <?php foreach($terms as $term) : ?>
    <div id="<?php echo $term->slug; ?>" class="productBlock">
      <h2 class="ttl__layout01"><?php echo $term->name; ?>商品一覧</h2>
      <?php
      $args = array(
        'category' => array($term->slug),
      );
      $products = wc_get_products($args);
      ?>
      <?php if($products) : ?>
        <ul class="list">
          <?php foreach($products as $product) : ?>
            <li class="item">
              <a href="<?php the_permalink($product->id); ?>">
                <div class="img__wrap">
                  <?php echo wp_get_attachment_image($product->image_id, 'full'); ?>
                </div>
                <p class="name"><?php echo $product->name; ?></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<?php get_footer();