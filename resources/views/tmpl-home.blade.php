{{--
  Template Name: Home
--}}



@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.home.shop-now')
    @include('partials.home.quote')
    @include('partials.home.advertise')
    @include('partials.home.slider')
    @include('partials.home.featured-collection-shopify1')
    @include('partials.home.seperator')
    @include('partials.home.blog')
  @endwhile
@endsection
