{{--
  Template Name: Dashboard Template
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
      <section class="page-content dashboard-content">
        <div class="container container-sm">
          <div class="cardstyle">
            <h4>PCC National Cabinet</h4>
            <h1>{!! App::title() !!}</h1>
            @php the_content() @endphp

            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingZero">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                      <i class="fas fa-folder-open"></i></i> Resources
                    </button>
                  </h2>
                </div>

                <div id="collapseZero" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <ul class="resources-ul">
                      <li><a href="/terms-of-service-agreement/" target="_blank"><i class="fas fa-file-contract"></i> Terms of Service Agreement</a></li>
                      <li><a href="/limited-partnership-agreement/" target="_blank"><i class="fas fa-file-contract"></i> Limited Partnership Agreement</a></li>
                      <li><a href="/wp-content/uploads/2020/05/Budget-Planning-Guide.xlsm"><i class="fas fa-file-excel green"></i> Budget Planning Guide</a></li>
                      <li><a href="/wp-content/uploads/2020/05/Measuring-Guide.pptx"><i class="fas fa-file-powerpoint red"></i> Measuring Guide</a></li>
                    </ul>


                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="far fa-cog"></i> Change My Information
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    {!! do_shortcode('[gravityform id="4" title="false" description="false"]') !!}
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="far fa-user"></i> Customer Contact Preferences
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    {!! do_shortcode('[gravityform id="5" title="false" description="false"]') !!}
                  </div>
                </div>
              </div>
            </div>
            <h3 class="h3-logout"><a href="/login"><i class="fas fa-sign-out-alt"></i> Log Out</a></h3>
          </div>
        </div>
      </section>
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
