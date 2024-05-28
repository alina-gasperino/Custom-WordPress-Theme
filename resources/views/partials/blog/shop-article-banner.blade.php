<style>
  @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');

  hr {
    background-color: black;
  }

  .shop-product .product-img p {
    margin: 5px !important;
  }

  .shop-product .product-img img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 0 auto !important;
  }
</style>


<?php if (have_rows('layouts')) : ?>
  <div class="article_pg_collection w-full text-center fixed bottom-0 left-0 right-0 bg-tan p-4 transition-all duration-300 z-40" id="stickyFooter">




    <div class="relative">
      <button class="absolute top-0 right-0 m-2 text-gray-600 hover:text-gray-800" id="dismissBtn">
        <svg class="dismissIcon hidden" width="18" height="16" viewBox="0 0 18 16" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <g id="PHASE-1-FINAL" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
            <g id="HOME—DESKTOP-Copy-12" transform="translate(-1111 -215)" stroke="#B3A091">
              <g id="Group" transform="translate(1112 215)">
                <path id="Line-5" d="M0 0l16 16" />
                <path id="Line-5-Copy-2" d="M0 16L16 0" />
              </g>
            </g>
          </g>
        </svg>
      </button>
      <div id="shopThis">
        <div id="collapsibleBtn" class="article_collection_title text-center">
          <button class="w-full">
            <h3 class="sm-headline caps color-dark-brown">SHOP THIS ARTICLE</h3>
          </button>
        </div>
      </div>
    </div>
    <!-- Pull products from article -->


    <div class="collapsible-content hidden pt-8">
      <div class="shop-this-article-slider shop-product">


        <?php if (have_rows('layouts')) : ?>
          <?php while (have_rows('layouts')) : the_row() ?>
            <?php if (get_row_layout() == 'product') : ?>


              <!-- Products -->
              <div class="product-img relative align-center">
                <!-- Product Image w/Shop Hover state -->
                <a href="<?php echo get_sub_field('product_link'); ?>" class="product-image-shop" target="_blank">
                  <img src="<?php echo get_sub_field('product_image'); ?>" alt="<?php echo get_sub_field('name'); ?>">
                  <div class="shop-hover-state">
                    Shop
                  </div>
                </a>
                <!-- Name -->
                <p class="md-headline caps"><?php echo get_sub_field('name'); ?></p>
                <!-- Brand -->
                <p class="sm-headline caps"><?php echo get_sub_field('brand'); ?></p>
                <!-- Price -->
                <p class="sm-headline caps">$<?php echo get_sub_field('price'); ?></p>
                <!-- Shop Now Button -->
                <div class="art_pdp_shop align-center">
                  <button class="article_pdp_btn shop-now"><a class="md-headline" href="{{ get_sub_field('product_link') }}">Shop Now</a></button>
                </div>
              </div> <!-- ./product-img -->


            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>


      </div><!-- ./shop-this-article-slider -->
    </div>
  </div>
<?php else : echo ('No products found in this article.'); ?>
<?php endif; ?>

<script>
  const stickyFooter = document.getElementById('stickyFooter');
  const dismissBtn = document.getElementById('dismissBtn');
  const collapsibleBtn = document.getElementById('collapsibleBtn');
  const collapsibleContent = stickyFooter.querySelector('.collapsible-content');
  const dismissBtnIcon = stickyFooter.querySelector('.dismissIcon');

  dismissBtn.addEventListener('click', () => {
    collapsibleContent.classList.toggle('hidden');
  });

  collapsibleBtn.addEventListener('click', () => {
    collapsibleContent.classList.toggle('hidden');
    dismissBtnIcon.classList.toggle('hidden');

  });
</script>