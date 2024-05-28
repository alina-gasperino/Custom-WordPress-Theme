<!-- Check value exists. -->

<?php if( have_rows('layouts') ): ?>
<section class="article_pg_collection fixed top-[90vh]  bg-blue-500 w-full px-6 py-6">

        <div id="shopThis"  class="section2-text">
          <div class="article_collection_title text-center">
            <h3 class="md-headline caps color-dark-brown">SHOP THIS ARTICLE</h3>
          </div>
        </div>
        <!-- Pull products from article -->
        <?php if(have_rows('layouts')): ?>
        <?php while (have_rows('layouts')) : the_row() ?>
        <?php  if(get_row_layout() == 'product'): ?>
        <div  class="shop-this-article-slider ">

          <div id="shopThisProds" class="shop-product">
            <div class="product-img relative align-center">
              <a href="<?php echo get_sub_field('product_link');?>" class="product-image-shop" target="_blank">
                <img src="<?php echo get_sub_field('product_image'); ?>" alt="<?php echo get_sub_field('name'); ?>">
                <div class="shop-hover-state">
                  Shop
                </div>
              </a>
              <p class="md-headline caps"><?php echo get_sub_field('name');?></p>
              <p class="sm-headline caps"><?php echo get_sub_field('brand');?></p>
              <p class="sm-headline caps">$<?php echo get_sub_field('price');?></p>
              <div class="art_pdp_shop align-center">
                <button class="article_pdp_btn shop-now"><a class="md-headline" href="{{ get_sub_field('product_link') }}">Shop Now</a></button>
              </div>
            </div>

          </div>
        </div>

          <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>

  <hr width="100%" height="10">
</section>
<?php endif; ?>

<style>


  #shopThisProds {
    display: none;
  }
  .shop-product .product-img p{
    margin: 5px !important;
  }

  .shop-product .product-img img {
    width:150px;
    height:150px;
    object-fit:cover;
  }

  hr {
    background-color: black;
  }

</style>

