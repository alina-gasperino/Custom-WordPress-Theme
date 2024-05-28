{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.about.hero')
    @include('partials.about.content')
    @include('partials.press.featured')
    @include('partials.social')
  @endwhile
@endsection
