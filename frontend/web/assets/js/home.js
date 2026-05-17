$(function() {
  function hideLoader() {
    $('#page-loader').css('opacity', '0');
    setTimeout(function() { $('#page-loader').remove(); }, 420);
  }
  setTimeout(hideLoader, 700);
  showToast('Bem-vindo à CARPOOL');
});

function showToast(message) {
  var toast = $('<div class="toast"></div>').text(message);
  $('#toast-container').append(toast);
  setTimeout(function() {
    toast.addClass('visible');
  }, 40);
  setTimeout(function() {
    toast.removeClass('visible');
    setTimeout(function() {
      toast.remove();
    }, 260);
  }, 3200);
}
