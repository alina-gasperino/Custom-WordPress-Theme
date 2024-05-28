{{--
  Template Name: Press
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.press.hero')
    @include('partials.press.press')
    @include('partials.press.featured')
    @include('partials.social')
  @endwhile
@endsection
