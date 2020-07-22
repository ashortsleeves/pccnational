{{--
  Template Name: Login Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="hero jumbo-bg" style="background-image: url({{$hero['global_background']['url']}})">
      <div class="container container-sm container-login">
        <div class="fp-section fp-login">
          <div class="login-icon">
            @if($header_logo)
              <img class="hero-logo" src="{{$header_logo}}" alt="logo" />
            @else
              <i class="fas fa-users"></i>
            @endif
          </div>

          @if ( ! is_user_logged_in() )
            <h1>Log in</h1>
            @php
              $args = array(
                'redirect' => '/dashboard',
                'form_id' => 'loginform-custom',
                'label_username' => __( 'Username' ),
                'label_password' => __( 'Password' ),
                // 'value_username' => __( 'Username' ),
                // 'value_password' => __( 'Password' ),
                'label_remember' => __( 'Remember Me' ),
                'label_log_in' => __( 'Partner Login' ),
                'value_remember' => true,
              );
              wp_login_form( $args );
            @endphp
              <a class="forgot-password" href="/wp-login.php?action=lostpassword">Forgot Password?</a>
          @else
            <a class="btn btn-lg" href="{!! wp_logout() !!}"><i class="fas fa-sign-out-alt"></i> LOG OUT</a>

            <a class="back-to-dashboard" href="/dashboard"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
          @endif

        </div>
      </div>
    </div>
  @endwhile
@endsection
