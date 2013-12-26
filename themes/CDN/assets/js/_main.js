// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {
  // All pages
  common: {
    init: function() {
      var elms = document.getElementsByTagName("*");
      var n = elms.length;
      for(var i = 0; i < n; i ++) {
          if(window.getComputedStyle(elms[i]).cursor === "pointer") {
              elms[i].style.cursor = "url(localhost/cdn/assets/img/fly-cursor.png)";
          }
      }
      $('.other-ep-slides').bxSlider({
        slideWidth: 172,
        minSlides: 2,
        maxSlides: 4,
        slideMargin: 20,
        pager: false
      });
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);
