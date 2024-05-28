<section class="blog-section margin-top--40">

  <?php
    $images = get_sub_field('images');
  ?>
@if(count($images) > 0)
  @if(count($images) == 1)
    <?php $image = get_sub_field('images'); ?>
    <img src="{{ $image[0]['image']['sizes']['slider'] }}" alt="{{ get_the_title() }}" class="w-100">
    @if($image[0]['photo_caption'])
    <div class="image-caption margin-top--10">
      {!! $image[0]['photo_caption'] !!}
    </div>
    @endif
  @else

    <div class="d-flex flex-wrap row-25">
      @while ( have_rows('images') ) @php(the_row())
      <div class="col-6 gap-25 margin-btm--30">
        <?php
        $image = get_sub_field('image');
        ?>
        <img src="{{ $image['sizes']['slider'] }}" alt="{{ get_the_title() }}" class="w-100">
        @if(get_sub_field('photo_caption'))
        <div class="image-caption margin-top--10">
          {!! get_sub_field('photo_caption') !!}
        </div>
        @endif
      </div>
      @endwhile
    </div>
  @endif
@endif
</section>
