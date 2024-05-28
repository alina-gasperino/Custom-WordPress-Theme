
<section class="section-text featured_collection_sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="section2-text">
          <div class="collection_main_title">
            <p><?php echo get_field('featured_collection_heading1');?></p>
          </div>
        </div>
        <div class="featured_collection_slider">
            <?php $featured_collection_shopify1 =  get_field('featured_collection_shopify1'); ?>

           <?php echo do_shortcode('[wps_products collection="SHOP OUR LINE" images_sizing_toggle="true"

            images_align="center"
            images_sizing_crop="center"
            images_sizing_height="200"
            show_images_carousel="false"

            carousel="true" 
            carousel_slides_to_show="5"
            carousel_slides_to_scroll="1"
            carousel_dots="false"

            carousel_prev_arrow="https://wordpress-877202-3039086.cloudwaysapps.com/wp-content/uploads/2022/10/arrow-left.png"
            carousel_next_arrow="https://wordpress-877202-3039086.cloudwaysapps.com/wp-content/uploads/2022/10/arrow-right.png"

            items_per_row="5"
            link_to="shopify"

            title_type_font_family="Cadiz Light"
            pricing_type_font_family="Akkurat-Mono"

            title_type_font_size="18.5px"
            pricing_type_font_size="13px"
            mobile_columns="2"

            show_featured_only="true"
            limit="8"]')?>
        </div>
        <div class="shop-button align-center">
          <button class="shop-now"><a href="https://ame-living-shop.myshopify.com/collections/all">Shop All</a>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>
