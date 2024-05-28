<header class="align-center post-header margin-top--40">
  <div class="single-share sm-headline caps">{{ get_primary_category(get_the_ID()) }}</div>
  <h1 class="headline-1 margin-top--10">{!! the_field('alternative_title', false, false) !!}</h1>
  <div class="margin-top--20">
    <div class="sm-headline caps align-center share-post relative">
      <span class="share-text">Share</span>
      <div class="social-icons-share">
        @include('partials.blog.share-post')
      </div>
    </div>
  </div>

</header>
