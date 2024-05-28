
<?php if( get_field('show_advert_01') == 'yes' ) { ?>
  

<section class ="section-banner-2">
  <div class="container-fluid p-0">
    <div class="row">


            <div class="col-md-6 order-md-1">
              <div class="slider-banner-image">
                <img src="<?php echo get_field('product_image');?>" width="100%" alt="Shop Now Hero Image">
                <!--<img src="http://localhost:10053/wp-content/themes/joon/dist/images/home/home-shop-now-left_3ab8c823.png">  -->
              </div>
            </div>
            
            <div class="col-md-6 d-flex align-items-end">
              <div class="banner-section-3">
                <div class="mb-5">
                  <!-- <div class="sub-title">
                    <p><?php //echo get_field('shop_now_hero_subtitle1');?></p>
                  </div> -->
                  <div class="sub-heading">
                    <!-- <h1><?php //echo get_field('shop_now_hero_heading');?></h1> -->
                    <h2><?php echo get_field('advertise_main_heading');?></h2>
                    <p><?php echo get_field('advertise_description');?></p>
                  </div>
                  <!-- <div class="heading heading-h2">
                    <h2><?php // echo get_field('shop_now_hero_subtitle2');?></h2>
                  </div> -->
                    <div class="shop-button">
                      <button class="shop-now">
                        <a href="<?php echo get_field('advertise_btn_url');?>"><?php echo get_field('advertise_btn_text');?></a>
                        </button>
                    </div>
                    

                    <div class="marquee-text">
                      <div class="marquee_text">

                        <?php $rotation_no = get_field('marquee_rotation'); ?>
                        <?php 
                        // $rotation_no = 15
                        for ($i=0; $i < $rotation_no; $i++) { 
                          
                        echo "<em>".get_field('marquee_title')."</em>";?> 
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16"> <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/> </svg>  -->
                        <span class="dot-icon">.</span>
                        <?php echo "<span class='marquee-text-inner'>".get_field('marquee_title') ."</span>" ; ?> 
                        <span class="dot-icon">.</span>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16"> <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/> </svg> -->
                        <?php  # code...
                        } ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<?php } ?>
