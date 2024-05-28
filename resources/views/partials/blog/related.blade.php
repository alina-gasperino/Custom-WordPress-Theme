

@php
$related = App::related();
@endphp
@if($related)
<section class="bg-tan block-padding--odd related-articles">
  <div class="container-lrg">
    <header class="align-center">
      <h3 class="md-headline caps color-dark-brown">Related Articles:</h3>
    </header>
    <div class="cat-master">
    <div class="d-flex row-30 flex-wrap margin-top--40 related-wrapper">
      @while($related->have_posts()) @php($related->the_post())
        @include('partials.content-sm')
      @endwhile
      @php(wp_reset_query())
    </div>
    </div>

    <!-- <div class="down-arrow d-flex justify-content-center w-100 margin-top--40 pad-btm--50" data-page="1" data-related-to="{{ get_the_ID() }}" data-max="{{ $related->max_num_pages }}" @if($related->max_num_pages == 1) style="display: none !important" @endif>
      <img src="@asset('images/icons/down-arrow.svg')" alt="Arrow">
    </div> -->

    <div class="down-arrow d-flex justify-content-center w-100 margin-top--40 pad-btm--50">
      <div id="loadMore" class="load-related-posts margin-top--60 sm-headline caps align-center" data-related-to="{{ get_the_ID() }}" data-offset="12"><img src="@asset('images/icons/down-arrow.svg')" alt="Arrow"></div>
    </div>
  </div>
</section>
@endif
