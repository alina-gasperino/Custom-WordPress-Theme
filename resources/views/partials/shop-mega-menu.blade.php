<section class="is-dropdown shop-menu bg-tan align-center">
  <div class="container-fluid">
    <div class="d-flex justify-content-between shop-details">
      <!-- Menu -->
        <ul class="shop-mega-menu mega-sub-nav">
          <li class="menu-item"><a href="https://ame-living-shop.myshopify.com/collections/all">SHOP AME</a></li>
          <li class="menu-item"><a href="/shop">SHOP AME-APPROVED</a></li>
        </ul>

      <!-- Shopify Products -->
      <div class="d-flex w-100 justify-content-start">
        <?php echo do_shortcode('[wps_products collection="Shop Mega Menu" images_sizing_toggle="true"

        images_align="center"
        images_sizing_crop="center"
        images_sizing_height="280"
        show_images_carousel="false"

        items_per_row="4"
        limit="4"
        link_to="shopify"

        title_type_font_family="Cadiz Light"
        pricing_type_font_family="Akkurat-Mono"

        title_type_font_size="27.5px"
        pricing_type_font_size="13px"
        mobile_columns="2"

        show_featured_only="true"
        ]')?>
      </div>

    </div>
  </div>
</section>


<style>
  .shop-mega-menu {
    padding-left: 0;
    padding-top:  0;
  }

  .shop-mega-menu .menu-item {
    text-align: left;
    font-family: 'Akkurat-Mono', sans-serif;
    font-size: 10px;
    letter-spacing: 2px;
    }

</style>
