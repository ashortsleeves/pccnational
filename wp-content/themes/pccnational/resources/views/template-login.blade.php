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
            <i class="fas fa-users"></i>
          </div>
          <h1>Login</h1>
          @php
          if ( ! is_user_logged_in() ) { // Display WordPress login form:
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
          } else { // If logged in:
              wp_loginout( home_url() ); // Display "Log Out" link.
              echo " | ";
              wp_register('', ''); // Display "Site Admin" link.
          }
          @endphp
          <a class="forgot-password" href="/wp-login.php?action=lostpassword">Forgot Password?</a>
        </div>
      </div>
    </div>
  @endwhile
@endsection
