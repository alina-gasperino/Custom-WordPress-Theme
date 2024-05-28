<section class="blog-section margin-top--40">
  <div class="md-headline caps">{!! get_sub_field('headline') !!}</div>
 <?php $stepCount = 1; ?>
  @while ( have_rows('steps') ) @php(the_row())
  <div class="margin-top--30">
    <div class="md-headline caps">
      Step {{ $stepCount }}:
    </div>
    <div class="step">
      {!! get_sub_field('step') !!}
    </div>
  </div>
  <?php $stepCount++; ?>
  @endwhile
</section>
