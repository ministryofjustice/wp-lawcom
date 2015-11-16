jQuery(document).ready(function($) {
  var top = 0;
  if ($('#wpadminbar').length > 0) {
    top = $('#wpadminbar').height();
  }
  $('.implementation-table').floatThead({top: top});
});
