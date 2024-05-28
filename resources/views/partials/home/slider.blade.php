<section class="hero-slider bg-tan relative">
  <div class="">
    @php $slider = get_field('featured_posts'); @endphp
    @if($slider)
      <!-- Slider -->
      <div class="featured--slider-wrapper">
        @foreach( $slider as $slide )
          <?php
          $image = get_field('featured_image', $slide->ID);
          $sliderImg = get_acf_image_by_id($image, 'slider-max');
          ?>
          <div class="featured--slide">
            <a href="{{ get_the_permalink($slide->ID) }}">
              <div class="">
                <img src="{{ $sliderImg }}" />
              </div>
              <div class="align-center pad-top--20 slide-header">
                <div class="sm-headline">
                  {{ get_primary_category($slide->ID) }}
                </div>
                <h2 class="headline-2 margin-top--10">{{ get_the_title($slide->ID) }}</h2>
                <div class="shop-button">
                  <button class="shop-now">Read Now</button>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <!-- /Slider -->
    @endif
  </div>
</section>
