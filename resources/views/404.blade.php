@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container min-40v">
      <div class="alert align-center">
        <h2 class="headline--2">{{ __('Sorry, no results were found.', 'sage') }}</h2>
      </div>
    </div>
  @endif
@endsection
