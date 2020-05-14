@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <section class="page-content">
      <div class="container container-sm">
        <div class="cardstyle">
          <h1>{!! App::title() !!}</h1>
          @php
            $user = wp_get_current_user();
          @endphp

          @if ( is_user_logged_in() && in_array( 'subscriber', (array) $user->roles ) )
            <sup class="green">You agreed to the Limited Partnership Agreement upon your registration with PCC National Cabinet on <strong>{!! date( "M d, Y", strtotime( $user->user_registered )) !!}</strong></sup>
          @endif

          @php the_content() @endphp

        </div>
      </div>
    </section>
  @endwhile
@endsection
