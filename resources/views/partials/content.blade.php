<?php
  if(!isset($loopCount)) {
    $loopCount = 0;
  }
?>
<article class="col-md-6 col-lg-5 col-md-5--lrg @if($loopCount == 2) offset-lg-1 @endif blog-list-item">
  <?php
  $image = get_field('featured_image');
  $sliderImg = get_acf_image_by_id($image, 'slider');
  ?>

  <a href="{{ get_the_permalink() }}">
    <div class="">
      <img src="{{ $sliderImg }}" alt="{!! get_the_title() !!}" class="w-100" />
    </div>
    <div class="align-center pad-top--20 title-header">
      @if(get_primary_category(get_the_ID()))
      <div class="sm-headline">
        {{ get_primary_category(get_the_ID()) }}
      </div>
      @endif
      <h2 class="headline-2 margin-top--10">
        @if(get_field('alternative_title'))
        {!! the_field('alternative_title', false, false) !!}
        @else
        {!! the_title() !!}
        @endif
      </h2>
    </div>
  </a>

<!-- Share this Article -->
<div class="margin-top--30">
  <div class="sm-headline caps align-center share-post relative">
    <span class="share-text">Share</span>
    <div class="social-icons-share">
      @include('partials.blog.share-post')
    </div>
  </div>
</div>


  <!-- Display Shop Widget for Manually Entered Products -->
   @include('partials.home.shop-article')



<!--@if(!is_archive() && get_field('shop_widget'))
  <div class="sm-shop margin-top--20">
    <div class="sm-headline caps align-center">
      Shop this article
    </div>
    <div class="margin-top--30 align-center shopable-widget">
      <div class="hidden-shop-widget">
        @php(the_field('shop_widget'))
      </div>
      <div class="vanish-reward-widget" data-count="2" data-count-mobile="2"></div>
    </div>
  </div>
  @endif-->
</article>
