// close the navbar
$("#menu-close").click(function(e) {
  e.preventDefault();
  $("#sidebar-wrapper").toggleClass("active");
});

// open the navbar
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#sidebar-wrapper").toggleClass("active");
});

// scroll to menu item
$(function() {
  $("a[href*='#']:not([href='#'])").click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

function toTrilobyte (str) {
  return str.split('').map(function (ch) {
    return ch.charCodeAt(0).toString(3);
  }).join('3');
}

function fromTrilobyte (str){
  return str.split('3').map(function(t){
    return String.fromCharCode(parseInt(t, 3));
  }).join('');
}

//# sourceMappingURL=all.js.map
