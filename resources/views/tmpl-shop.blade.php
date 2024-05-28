{{--
  Template Name: Shop
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.shop')
    @include('partials.blog.related')
  @endwhile
@endsection
