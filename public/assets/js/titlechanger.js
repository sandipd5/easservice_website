$(function() {
  var message = "View our services";
  var original;

  $(window).focus(function() {
    if (original) {
      document.title = original;
    }
  }).blur(function() {
    var title = $('title').text();
    if (title != message) {
      original = title;
    }
    document.title = message;
  });
});

