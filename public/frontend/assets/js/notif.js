window.onload = function() {
    var message = "{{ session('success') }}";
    if (message) {
      var notification = document.createElement('div');
      notification.classList.add('notification');
      notification.innerHTML = message;
      document.body.appendChild(notification);
      setTimeout(function() {
        notification.classList.add('show');
        setTimeout(function() {
          notification.classList.remove('show');
          setTimeout(function() {
            notification.remove();
          }, 300);
        }, 3000); // Durasi tampilan notifikasi dalam milidetik (misalnya 3000 = 3 detik)
      }, 100);
    }
  };