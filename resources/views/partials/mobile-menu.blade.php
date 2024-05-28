<!-- bg-tan -->
<section class="mobile-menu mobile-menu-2">
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

  <div class="footer-sm">
    <div class="container-lrg">
      <div class="mobile-menu-footer">
        <ul class="d-flex justify-content-center main-nav mobile-footer-nav">
          <li class=""><a href="{{ home_url('about') }}">About</a></li>
          <!-- <li class=""><a href="{{ home_url('press') }}">Press</a></li> -->
          <li><a href="{{ home_url('contact') }}" class="mobile-contact-trigger">Contact</a></li>
        </ul>
      </div>
    </div>
    @include('partials.footer-sm')
  </div>
</section>
