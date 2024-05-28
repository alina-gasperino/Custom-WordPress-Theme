@if(get_field('shop_widget'))
<section class="related-shop margin-top--40">
  <div class="container-lrg">
    <header class="align-center margin-top--30">
      <h3 class="sm-headline caps color-dark-brown">Shop This Feature:</h3>
    </header>
    <div class="margin-top--30 align-center">
      <div class="shopable-widget">
        <div class="hidden-shop-widget">
          @php(the_field('shop_widget'))
        </div>
        <div class="vanish-reward-widget"></div>
      </div>
    </div>
  </div>
</section>
@endif
