<!-- Check value exists. -->

<?php if( have_rows('layouts') ): ?>
<section class="article_pg_collection transparent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="section2-text">
          <div class="article_collection_title text-center">
            <h3 class="md-headline caps color-dark-brown">SHOP THIS ARTICLE</h3>
          </div>
        </div>
        <div class="blog-product-slider">
        <!-- Pull products from article -->
        <?php if(have_rows('layouts')): ?>
        <?php while (have_rows('layouts')) : the_row() ?>
        <?php  if(get_row_layout() == 'product'): ?>

          <div class="shop-product">
            <div class="product-img relative align-center">
              <a href="<?php echo get_sub_field('product_link');?>" class="product-image-shop" target="_blank">
                <img src="<?php echo get_sub_field('product_image'); ?>" alt="<?php echo get_sub_field('name'); ?>">
                <div class="shop-hover-state">
                  Shop
                </div>
              </a>
              <p class="sm-headline caps"><?php echo get_sub_field('name');?></p>
              <p class="sm-headline caps"><?php echo get_sub_field('brand');?></p>
              <p class="sm-headline caps">$<?php echo get_sub_field('price');?></p>
            </div>

          </div>

          <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<style>
  .transparent {
    background: transparent !important;
  }

  .shop-product .product-img p{
    margin: 5px !important;
  }

  .shop-product .product-img img {
    width:110px;
    height:110px;
  object-fit:cover;
  }

</style>
