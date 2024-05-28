<section class="press-hero pad-top--50">
  <div class="container-lrg">
    <div class="d-lg-flex align-items-center">
      <div class="col-lg-5 align-center">
        <div class="sm-headline color-brown">{{ get_field('pre_headline') }}</div>

        <div class="quote-slider">
          @while(have_rows('quotes')) @php(the_row())
          <div class="quote-wrap">
            <h2 class="margin-top--30 color-brown quote-title">@php(the_sub_field('quote'))</h2>
            <div class="sm-headline margin-top--30 color-brown">{{ get_sub_field('author') }}</div>
          </div>
          @endwhile
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1 align-center border-left-brown press-logos">
        <div class="sm-headline color-brown">{{ get_field('seen_headline') }}</div>
        <div class="d-flex flex-wrap align-items-center logo-group">
          @if(have_rows('logos'))
          @while ( have_rows('logos') ) @php(the_row())
            <div class="col-6 col-lg-4 logo-item align-center">
              @if(get_sub_field('link')) <a href="{{ get_sub_field('link') }}" target="_blank"> @endif
              <img src="{{ get_sub_field('logo') }}" alt="">
              @if(get_sub_field('link')) </a> @endif
            </div>
          @endwhile
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
