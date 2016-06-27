function notify (type, title, message) {
  var elem = $('<div class="notification clear"><div class="icon-container"><i class="fa fa-2x fa-bell"></i></div><div class="text-container"><h4>Notification</h4><p>You have been notified</p></div></div>"');
  elem.find('h4').text(title);
  elem.find('p').text(message);
  elem.addClass('bg-green');
  $('.notification-container').prepend(elem);
  setTimeout(function () {
    elem.removeClass('clear');

  }, 250);
}
