<?php
  if(!isset($colSm)) {
    $colSm = "col-6";
  } else {
    $colSm = "headline-2--lg";
  }
?>
<article class="{{ $colSm }} col-md-4 col-lg-3 gap-30 blog-list-item-sm">
  <?php
  $image = get_field('featured_image');
  $sliderImg = get_acf_image_by_id($image, 'slider');
  ?>

  <a href="{{ get_the_permalink() }}">
    <div class="">
      <img src="{{ $sliderImg }}" alt="{!! get_the_title() !!}" class="w-100" />
    </div>
    <div class="align-center pad-top--20 title-header-sm">
      <div class="sm-headline">
        {{ get_primary_category(get_the_ID()) }}
      </div>
      <h2 class="headline-3 margin-top--10 font-cadiz-light">{!! get_the_title() !!}</h2>
    </div>
  </a>
</article>
