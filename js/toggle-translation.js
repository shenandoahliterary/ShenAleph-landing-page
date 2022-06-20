( function($) {
//$(document).ready(function () {
  console.log("in script");
  $('#translation-control-panel').css('visibility', 'hidden');

    $("#select-original").click(function (e) {
      e.preventDefault();
      console.log("original clicked");
      $('#translation').hide('slow');
    //  $('#translation').css('visibility', 'hidden');
    //  $("#original").css('visibility', 'visible');
    //  if ($('#original').css('display') == 'none') {
      //  $('#mugo-video').css('visibility', 'hidden');
      //  $('#original').css('display', 'block');
    //  }
    });
    $("#select-translation").click(function (f) {
      f.preventDefault();
      console.log("translation clicked");
      $('#original').hide('slow');
      $('#translation').show('slow');

    });
//});
} )(jQuery);
