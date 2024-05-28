<section class="blog-section product-section margin-top--60">
 <hr width="100%" height="3">
  <div class="produc-img relative align-center">
    <a href="{{ get_sub_field('product_link') }}" class="product-image-shop" target="_blank">
      <img src="{{ get_sub_field('product_image') }}" alt="{{ get_sub_field('name') }}">
      <div class="shop-hover-state">
        Shop
      </div>
    </a>
  </div>
  <div class="product-details margin-top--10 align-center">
    <!-- <div class="product-count md-headline caps">
      {{ $productCount }}.
    </div> -->
    <div class="lg-headline margin-top--20">
      {{ get_sub_field('name') }}
    </div>
    @if(get_sub_field('brand'))
      <div class="md-headline caps">
        {{ get_sub_field('brand') }}
      </div>
    @endif
    @if(get_sub_field('price'))
      <div class="md-headline caps">
        ${{ get_sub_field('price') }}
      </div>
    @endif
  </div>
  <!-- <div class="product-desc margin-top--20">
    @php(the_sub_field('description'))
  </div> -->
  <div class="art_pdp_shop align-center">
    <button class="article_pdp_btn shop-now"><a class="md-headline" href="{{ get_sub_field('product_link') }}">Shop Now</a></button>
  </div>
 
</section>

<style>

</style>
