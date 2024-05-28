<section class ="section-banner section-index custom-banner">
  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-6 ">
        <div class="slider-banner-image">
          <?php if( get_field('choose_to_upload_cta') == 'Image'): ?>
            <img src="<?php echo get_field('shop_now_cta_img');?>" width="100%" alt="Shop Now CTA Image">
            <!--<img src="http://localhost:10053/wp-content/themes/joon/dist/images/home/home-shop-now-left_3ab8c823.png">  -->
          <?php endif; 
            if(get_field('choose_to_upload_cta') == 'Video'): ?>
              <div class="embed-container">
                <?php the_field('shop_now_cta_video'); ?>
              </div>

          <?php endif; ?>

        </div>
        
      </div>

            <div class="col-sm-6 bg-alt">
              <div class="banner-section-block-2-text">
                <div class="mb-5 mt-4 banner-section-block-2-text living_banner_section">
                  <div class="sub-title">
                    <p><?php echo get_field('shop_now_cta_subtitle1');?></p>
                  </div>
                  <div class="sub-heading heading-h1">
                    <h1><?php echo get_field('shop_now_cta_heading');?></h1>
                  </div>
                  <div class="heading heading-h2">
                    <h2><?php echo get_field('shop_now_cta_subtitle2');?></h2>
                  </div>
                    <div class="shop-button">
                      <button class="shop-now">
                        <a href="<?php echo get_field('shop_now_cta_btn_url');?>"><?php echo get_field('shop_now_cta_btn_txt');?></a>
                        </button>
                    </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</section>
