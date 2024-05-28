@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
  <script>
// Start marquee
/*jQuery('.marquee_text').marquee({
    direction: 'top',
    duration: 10000,
    gap: 50,
    delayBeforeStart: 0,
    duplicated: true,
    startVisible: true,
    height:200,
    width:600
});*/
</script>
@endsection
