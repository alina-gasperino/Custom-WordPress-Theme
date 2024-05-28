<section class="bg-tan-light block-padding--odd">
  <div class="container-lrg">
    <header class="align-center">
      <h3 class="md-headline caps color-dark-brown">{{ $featured['feat_cat_headline'] }}</h3>
    </header>
    <div class="d-flex row justify-content-between margin-top--40">
      <?php $featureCount = 0; ?>
      @foreach($featured['feat_posts'] as $feature )
      <div class="col-6 col-lg-3 @if($featureCount > 1) hide-lg @endif featured-article">
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
      <?php $featureCount++ ?>
      @endforeach
    </div>
  </div>
</section>
