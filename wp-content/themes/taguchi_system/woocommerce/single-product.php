<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="productSec sec">
	<div class="container">
		<div class="row">
			<div class="left">
					<?php woocommerce_template_single_title(); ?>
					
					<?php woocommerce_show_product_images(); ?>

					<div class="tabs">
						<div class="tab__head">
							<input id="tab01" type="radio" name="tab_switch" checked>
							<label class="tab__label" for="tab01">商品説明</label>
							<input id="tab02" type="radio" name="tab_switch">
							<label class="tab__label" for="tab02">サイズ・商品詳細</label>
						</div>
							
						<div id="tab01__content" class="tab__content">
							<p><?php the_content(); ?></p>
						</div>
						<div id="tab02__content" class="tab__content">
							<p><?php woocommerce_template_single_excerpt(); ?></p>
						</div>
					</div>
			</div>

			<div class="right">
				<?php woocommerce_template_single_title(); ?>
				<div class="price__wrap">
					<?php woocommerce_template_single_price(); ?><span class="taxin">(税込)</span>
				</div>
				<?php woocommerce_template_single_add_to_cart(); ?>
				<a href="<?php echo home_url(); ?>/cart/" class="btn btn__layout02">カートを見る</a>
			</div>
		</div>
	</div>
</section>

<?php endwhile; ?>

<?php get_footer();