<section class="page-content page-form">
  <div class="container container-sm">
    <div class="cardstyle">
      <div class="title">
        <span class="site-title">{{$site_name}}</span>
        <h1>{!! App::title() !!}</h1>
        <span class="subtext">{{$form_temp['subtext']}}</span>    
      </div>

      @php the_content() @endphp
    </div>
  </div>
</section>
