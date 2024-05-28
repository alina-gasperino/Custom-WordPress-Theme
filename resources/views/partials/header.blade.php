@if(get_field('banner_image', 'options'))
<link rel="stylesheet" href="https://www.lanskey.com.au/assets/plugins/limarquee/css/liMarquee-theme.css">
<link rel="stylesheet" href="https://www.lanskey.com.au/assets/plugins/limarquee/css/liMarquee.css">


<div class="announcement-bar bg-white">
  <div class="container-lrg">
    <a href="{{ get_field('banner_ad_link', 'options') }}" target="_blank">
      <img src="{{ get_field('banner_image', 'options')['sizes']['banner-add'] }}" alt="Ad Space">
    </a>
  </div>
</div>
@endif

@if(get_field('announcement_bar', 'options'))
<div class="announcement-bar sm-headline">
  <div class="hide-lg">
    @php(the_field('announcement_bar', 'options', false))
  </div>
  <div class="show-lg">
    <marquee scrollamount="3">@php(the_field('announcement_bar', 'options', false))</marquee>
  </div>

</div>
@endif
<header class="main-header relative" id="primary-nav">
  <div class="d-flex align-items-center primary-nav-wrapper nav-border-btm">
    <nav class="nav-primary col-md-3 col-lg-5 left-nav">
      <div class="nav--desktop w-100">
        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-nav w-100 d-flex cat-nav']) !!}
        @endif
      </div>

      <div class="nav--mobile d-flex align-items-center">
        <button class="hamburger hamburger--slider" type="button" onclick="myFunction()">
          <!-- hamburger hamburger--slider js-hamburger  -->
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </nav>
    <div class="col-lg-2 col-6 d-flex justify-content-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.svg')" alt="Joon" />
      </a>
    </div>
    <nav class="nav-primary col-md-3 col-lg-5">
      <div class="nav--desktop d-flex justify-content-end right-nav align-items-center">
        @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'main-nav w-100 d-flex justify-content-end']) !!}
        @endif
        <li class="search-nav-item"><a href="https://ame-living-shop.account.myshopify.com/?locale=en" class="search-event"><img src="@asset('images/icons/icon-search.svg')" alt="search" class="search--icon" /></a></li>
        <li class="cart-nav-item"><a href="https://ame-living-shop.myshopify.com/cart" class="cart-event"><img src="@asset('images/icons/shopping-cart.svg')" alt="cart" class="cart--icon" /></a></li>

      </div>
      <div class="d-flex justify-content-end nav--mobile">
        <li class="search-nav-item"><a href="#" class="search-event"><img src="@asset('images/icons/mobile-search.svg')" alt="search" class="search--icon" /></a></li>
      </div>

    </nav>
  </div>
  @include('partials.follow')
  @include('partials.mega-menu')
  @include('partials.contact-menu')
  @include('partials.shop-mega-menu')
  @include('partials.search-bar')
</header>


<!-- bg-tan -->
<!-- mobile-menu  -->
<section class="mobile-menu"  id="myDIV">
  <div class="">
    <div class="nav--mobile w-100 mobile-nav-sec new-scrollbar relative">
      @if (has_nav_menu('mobile_navigation'))
        {!! wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'main-nav cat-nav mobile-menu-links']) !!}
      @endif

      <div class="mobile-contact">
        <div class="contact-details">
          @while ( have_rows('contact_info', 'options') ) @php(the_row())
          <div class="contact-wrap align-center">
            <h3 class="headline-3 font-cadiz-light contact-desc">{{ get_sub_field('contact_desc') }}</h3>
            <div class="sm-headline margin-top--20">
              <a href="mailto:{{ get_sub_field('contact_info') }}">{{ get_sub_field('contact_info') }}</a>
            </div>
          </div>
          @endwhile
        </div>
      </div>
    </div>
  </div>

  
</section>

