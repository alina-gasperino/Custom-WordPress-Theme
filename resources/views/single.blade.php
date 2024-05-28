@extends('layouts.app')

@section('content')
<?php $productCount = 1 ?>
  @while(have_posts()) @php the_post() @endphp
    <div class="container-sm blog-container">
      @include('partials.blog.header')
      @include('partials.blog.featured')

      @if( have_rows('layouts') )
          @while ( have_rows('layouts') ) @php(the_row())

            @if( get_row_layout() == 'content' )

              @include('partials.blog.content')

            @elseif( get_row_layout() == 'blockquote' )

              @include('partials.blog.blockquote')

            @elseif( get_row_layout() == 'image_grid' )

              @include('partials.blog.image')

            @elseif( get_row_layout() == 'product' )

              @include('partials.blog.product')
              @php($productCount++)

            @elseif( get_row_layout() == 'recipe' )

              @include('partials.blog.recipe')

            @elseif( get_row_layout() == 'recipe_steps' )

              @include('partials.blog.recipe-steps')

            @elseif( get_row_layout() == 'related_post' )

              @include('partials.blog.related-post')

            @endif

          @endwhile

        @endif
    </div>
   <!--   @include('partials.blog.shop')-->
    @include('partials.blog.shop-article-banner')

    @include('partials.blog.related')

  @endwhile
@endsection
