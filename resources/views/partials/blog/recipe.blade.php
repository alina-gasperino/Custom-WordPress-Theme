<section class="blog-section margin-top--40">
  <h3 class="headline-3">{!! get_sub_field('headline') !!}</h3>

  @while ( have_rows('recipe_details') ) @php(the_row())
  <div class="recipe-detail md-headline caps margin-top--20 @if(get_sub_field('2_columns')) d-lg-flex @endif">
    <div class="@if(get_sub_field('2_columns')) col-lg-6 gap-25 @endif">
      {!! get_sub_field('column_1') !!}
    </div>

    @if(get_sub_field('2_columns'))
    <div class="col-lg-6 gap-25">
      {!! get_sub_field('column_2') !!}
    </div>
    @endif
  </div>
  @endwhile
</section>
