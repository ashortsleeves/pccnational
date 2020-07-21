@php
  if(is_user_logged_in()) {
    $css_log = 'sl-logged-in';
  }
@endphp

<header class="banner">
  <div class="container">
    <a class="brand @if($header_logo) brand-logo @endif" href="{{ home_url('/') }}">
      {{$site_name}}
      <span>{{get_bloginfo('description')}}</span>
      @if($header_logo)
        <img class="hero-logo" src="{{$header_logo}}" alt="logo" />
      @endif
    </a>

    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav '.$css_log.'']) !!}
      @endif
    </nav>

    <button class="hamburger">
      <span>toggle menu</span>
    </button>
  </div>
</header>

<div class="sideNav" id="sideNav">
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav '.$css_log.'']) !!}
    @endif
  </nav>
</div>
