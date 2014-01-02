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
       $('#video-feed').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 180,
        itemMargin: 10,
        asNavFor: '#episodes'
      });
       
      $('#episodes').flexslider({
        animation: "fade",
        controlNav: false,
        controlsContainer: ".flex-controls",
        animationLoop: false,
        slideshow: false,
        sync: "#video-feed"
      });

      $('.video-item').hover(function() {
        var imgSrc = $(this).find('.hover-once').attr('data-src');
        //alert(imgSrc);
        $('.hover-once').attr('src', imgSrc);
      }, function() {

        $('.hover-once').attr('src', '');
      });

      $('.modal-block a').click(function(){
          window.location.hash = $(this).attr('href'); //set hash
          return false; //disables browser anchor jump behavior
      });
      $('footer li').click(function(){
          window.location.hash = $(this).attr('data-hash'); //set hash
          return false; //disables browser anchor jump behavior
      });
      $(window).bind('hashchange', function () { //detect hash change
          $('.modal-window').removeClass('active');
          var hash = window.location.hash.slice(1); //hash to string (= "myanchor")
          // alert(hash);
          $('#' + hash).addClass('active');
      });
      $('.modal-window').on('click', function() {
        $(this).removeClass('active');
          window.location.hash = '#clear'; //set hash
          return false;
      });
      $('.modal-window .modal-container').on('click', function(event) {
        event.stopPropagation();
        return false;
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
