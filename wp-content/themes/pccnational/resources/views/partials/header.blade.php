<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{$site_name}} <span>{{get_bloginfo('description')}}</span></a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
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
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
</div>
