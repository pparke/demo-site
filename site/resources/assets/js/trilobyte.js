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
