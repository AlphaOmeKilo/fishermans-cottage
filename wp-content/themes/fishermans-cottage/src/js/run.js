var fc = fc || {};

(function() {
  'use strict';

  //

  fc.globals = {};

  fc.globals.baseUrl = window.location.href;
  if (fc.globals.baseUrl.substr(-1) === "/") {
    fc.globals.baseUrl = fc.globals.baseUrl.replace(/\/+$/, "");
  }

  fc.globals.scrollingDown = false;
  fc.globals.atBottom = false;
  fc.globals.scrollTop = 0;

  //
  // ready

  $(document).ready(function() {
    fc.globals.windowHeight = $(window).height();
    fc.globals.windowWidth = $(window).width();
  });

  //
  // load

  $(window).on("load resize", function() {
    fc.globals.windowHeight = $(window).height();
    fc.globals.windowWidth = $(window).width();
  });

  //
  // scroll

  $(window).on("scroll", function() {
    var scrollTop = $(document).scrollTop();

    fc.globals.scrollDiff = scrollTop - fc.globals.scrollTop;
    fc.globals.scrollingDown = fc.globals.scrollDiff > 0;
    fc.globals.scrollTop = scrollTop;

    if (fc.globals.scrollTop >= $(document).height() - fc.globals.windowHeight) {
      fc.globals.atBottom = true;
    } else {
      fc.globals.atBottom = false;
    }
  });

  fc.init = function() {
    fc.header.init();
    fc.home.init();
  }

  jQuery(function($) {
    fc.init();
  });
})();
