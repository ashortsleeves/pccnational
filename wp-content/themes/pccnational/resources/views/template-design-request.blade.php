{{--
  Template Name: Design Request Template
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
      <section class="page-content page-form">
        <div class="container container-sm">
          @php the_content() @endphp
        </div>
      </section>

      @if($modal)
        <div class="container-modal-btn">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal">Specifier Catalog<i class="fas fa-book-open"></i></button>
        </div>
        <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static"  data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <embed src="{{$modal['url']}}">
              </div>
            </div>
          </div>
        </div>
      @endif
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
