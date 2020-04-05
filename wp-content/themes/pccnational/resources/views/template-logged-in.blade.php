{{--
  Template Name: Login Required Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @php
      //page template
      $role = $get_user_role;
      global $current_user; wp_get_current_user();
    @endphp

    @if($role == "subscriber")
      @include('partials.content-page')
    @else
      <section class="page-content not-logged jumbo-bg" style="background-image: url({{$hero['global_background']['url']}})">
        <div class="container container-sm">
          <div class="not-logged-content">
            <h1>ACCESS DENIED</h1>
            <h2>You must be a PCC National Cabinet partner to access this page</h2>
            <a class="btn btn-lg" href="/login">Login</a> <a class="btn btn-secondary btn-lg" href="/join-us">Join Us</a>
          </div>
        </div>
      </section>

    @endif
  @endwhile
@endsection
