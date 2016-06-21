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
