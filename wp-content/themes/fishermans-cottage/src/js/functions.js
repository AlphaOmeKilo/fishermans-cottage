////////////

// theme specific

// ...

////////////

// util

function isTablet() {
  return fc.globals.windowWidth < 1024;
}

function isMobile() {
  return fc.globals.windowWidth < 768;
}

function isDefined(obj) {
  return typeof obj !== "undefined" && obj != null;
}

function isInScrolledView(elem) {
  var docViewTop = $(document).scrollTop();
  var docViewBottom = docViewTop + $(window).height();

  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();

  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }

  return array;
}

function randomInt(bound) {
  return Math.floor(Math.random() * bound);
}
