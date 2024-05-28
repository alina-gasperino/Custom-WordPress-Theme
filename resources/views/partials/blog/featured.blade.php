<section class="blog-section margin-top--40">
  <?php
  $image = get_field('featured_image');
  $image = get_acf_image_by_id($image, 'full');
  ?>
  <img src="{{ $image }}" alt="{{ get_the_title() }}" class="w-100">
  @if(get_field('featured_photo_caption'))
  <div class="image-caption margin-top--10">
    {!! get_field('featured_photo_caption') !!}
  </div>
  @endif
</section>
