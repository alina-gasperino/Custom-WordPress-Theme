<?php $images = get_field('images'); ?>
<section class="margin-top--60 margin-btm--100">
  <div class="container-lrg">
    <div class="show-lg mobile-featured">
      <img src="{{ $images[0]['image'] }}" alt="" class="w-100">
    </div>
    <div class="d-lg-flex row-80">
      <div class="col-lg-6 gap-80 hide-lg">
        @if( have_rows('images') )
        <?php $imageCount = 1; ?>
          @while ( have_rows('images') ) @php(the_row())
            <?php
              if($imageCount == 2 ) {
                $imgClass = "img-2";
              } elseif($imageCount == 3) {
                $imgClass = "img-3";
                $imageCount = 1;
              } else {
                $imgClass = "img-1";
              }
            ?>
            <div class="{{ $imgClass }} stacked-imgs"> <img src="{{ get_sub_field('image') }}" alt=""> </div>
            @php($imageCount++)
          @endwhile
        @endif
      </div>
      <div class="col-lg-6 gap-80 border-left-brown bquote-sm">
        @php(the_field('content'))
      </div>
    </div>
  </div>
</section>
