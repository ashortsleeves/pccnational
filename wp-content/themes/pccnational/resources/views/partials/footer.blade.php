<footer class="content-info">
  <div class="container container-sm">
    <div class="brand-container">
      <a class="brand" href="{{ home_url('/') }}">{{$site_name}} <span>{{get_bloginfo('description')}}</span></a>
    </div>

    <div class="nap">
      <ul>
        <li class="address">
          <span>
            {{$footer['site_info']['address']}}<br />
            {{$footer['site_info']['town']}}
            {{$footer['site_info']['state']}}
            {{$footer['site_info']['zip']}}
          </span>
        </li>
        <li class="email"><a href="mailto:{{$footer['site_info']['email']}}">{{$footer['site_info']['email']}}</a></li>
        @if($footer['site_info']['phone'])
          <li class="phone"><a href="tel:{{$footer['site_info']['phone']}}">{{$footer['site_info']['fax']}}</a></li>
        @endif
        @if($footer['site_info']['fax'])
          <li class="fax"><a href="tel:{{$footer['site_info']['fax']}}">{{$footer['site_info']['fax']}}</a></li>
        @endif
      </ul>
    </div>
    <div class="footer-nav">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-wd-10 col-12 col-copyright">
        <div class="ci-copy">
         Website Design & Development © <?php echo date("Y"); ?>
          <a href="http://www.crafticonic.com/" target="blank" title="Craft Iconic">
            Craft Iconic
          </a>
        </div>
        <div class="client-copy">
         Website Content Copyright © <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>
         |  <a href="/sitemap_index.xml" target="_blank">Sitemap</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "LocalBusiness",
  "name": "{{ get_bloginfo('name', 'display') }}",
  "telephone": "{{$footer['site_info']['phone']}}",
  "address":
  [
      {
          "@type": "PostalAddress",
          "streetAddress": "{!! $footer['site_info']['address'] !!}",
          "addressLocality": "{!! $footer['site_info']['town'] !!}",
          "addressRegion": "{!! $footer['site_info']['state'] !!}",
          "postalCode": "{!! $footer['site_info']['zip'] !!}"
      },
  ]
}
</script>
