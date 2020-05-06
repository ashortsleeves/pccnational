export default {
  init() {
    // JavaScript to be fired on the cabinets page
  },
  finalize() {
    // JavaScript to be fired on the cabinets page, after the init JS

    var lazyloadImages = document.querySelectorAll('img.lazyload');
    var lazyloadThrottleTimeout;

    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }

      lazyloadThrottleTimeout = setTimeout(function() {
          var scrollTop = window.pageYOffset;
          lazyloadImages.forEach(function(img) {
              if(img.offsetTop < (window.innerHeight + scrollTop)) {
                img.src = img.dataset.src;
                img.classList.remove('lazyload');
              }
          });
          if(lazyloadImages.length == 0) {
            document.removeEventListener('scroll', lazyload);
            window.removeEventListener('resize', lazyload);
            window.removeEventListener('orientationChange', lazyload);
          }
      }, 20);
    }

    document.addEventListener('scroll', lazyload);
    window.addEventListener('resize', lazyload);
    window.addEventListener('orientationChange', lazyload);

    $('.door-filters').change(function() {
        var styles = document.getElementById("styles").value;
        var materials = document.getElementById("materials").value;
        var construction = document.getElementById("construction").value;

        var stylesData = "[data-styles*='"+styles+"']";
        var materialsData = "[data-materials*='"+materials+"']";
        var constructionData = "[data-construction*='"+construction+"']";
        //
        if (styles === "All"){
          stylesData = "";
        };

        if (materials === "All"){
          materialsData = "";
        };

        if (construction === "All"){
          constructionData = "";
        };

        var links = $(".door-card"+stylesData+materialsData+constructionData);
        $(".door-card").hide();
        $(links).show();

        console.log(styles)
        console.log(materials);
        console.log(construction);

        console.log(links);
    });
  },
};
