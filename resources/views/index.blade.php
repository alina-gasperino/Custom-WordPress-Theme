@extends('layouts.app')

@section('content')
<?php $loopCount = 1; ?>
<?php $category  = get_queried_object(); ?>
  <section class="bg-tan pad-top--25">
    <div class="container-lrg">
      @include('partials.page-header')

      <div class="margin-top--30">
        @if (!have_posts())
        <div class="alert align-center">
          <h2 class="headline--2">{{ __('Sorry, no results were found.', 'sage') }}</h2>
        </div>
        @endif

        <div class="cat-master">
          <div class="d-flex flex-wrap justify-content-lg-center row-30 cat-list">
            @while (have_posts()) @php the_post() @endphp
            @if($loopCount <= 2)
              @include('partials.content-'.get_post_type())
            @else
              @php($colSm = 'col-12')
              @include('partials.content-sm')
            @endif
            <?php $loopCount++; ?>
            @endwhile
          </div>
        </div>

        <div class="down-arrow d-flex justify-content-center w-100 margin-top--40 pad-btm--50">
          <div id="loadMore" class="load-more-posts margin-top--60 sm-headline caps align-center" data-post-category="{{ $category->term_id }}" data-offset="11" data-layout="article-lrg"><img src="@asset('images/icons/down-arrow.svg')" alt="Arrow"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
