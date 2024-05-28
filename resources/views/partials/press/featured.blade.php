<section class="bg-tan block-padding--odd border-btm--brown">
  <div class="container-lrg">
    <header class="align-center">
      <h3 class="md-headline caps color-dark-brown">Featured Articles:</h3>
    </header>
    <div class="d-flex row-30 justify-content-between margin-top--40">

        @php($featured = get_field('featured_articles'))
        <?php $featuredCount = 0; ?>
        @foreach($featured as $feature )
        <div class="gap-30">
          <?php

          $image = get_field('featured_image', $feature->ID);
          $sliderImg = get_acf_image_by_id($image, 'slider');
          ?>
          <a href="{{ get_the_permalink($feature->ID) }}">
            <div class="">
              <img src="{{ $sliderImg }}" alt="{!! get_the_title($feature->ID) !!}" class="w-100" />
            </div>
            <div class="align-center pad-top--20">
              <div class="sm-headline">
                {{ get_primary_category($feature->ID) }}
              </div>
              <h3 class="headline-3 font-cadiz-light margin-top--10">{!! get_the_title($feature->ID) !!}</h3>
            </div>
          </a>
        </div>
        <?php $featuredCount++; ?>
        @endforeach
      
    </div>
  </div>
</section>
