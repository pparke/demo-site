$(document).ready(function(){
  // close the navbar
  $("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });

  // open the navbar
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    console.log('open menu')
    $("#sidebar-wrapper").toggleClass("active");
  });

  // scroll to menu item
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

function hexanate(str){
  var arr = toCharCode(str);
  var len = Math.floor(arr.length / 3);
  var r = arr.slice(0, len);
  var g = arr.slice(len, len+len);
  var b = arr.slice(len*2, len*3);
  return toHexByte(sum_array(r)) + toHexByte(sum_array(g)) + toHexByte(sum_array(b));
}

function sum_array (arr){
  return arr.reduce(function(prev, cur){
    prev += cur;
    return prev;
  }, 0);
}

function toCharCode(str){
  return str.split('').map(function(ch){
    return ch.charCodeAt(0);
  });
}

function toHexByte(n) {
  var val = (n%128).toString(16);
  if (val.length < 2) {
    val = '0' + val;
  }
  return val;
}

//# sourceMappingURL=all.js.map
