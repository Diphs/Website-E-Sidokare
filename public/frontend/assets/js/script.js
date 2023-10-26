
function handleFotoChange() {
  var inputFoto = document.getElementById('foto');
  var inputGantiFoto = document.getElementById('ganti-foto');
  var imgPreview = document.querySelector('.form-foto img');

  inputGantiFoto.addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      imgPreview.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(file);
  });

  inputFoto.addEventListener('change', function() {
    if (inputFoto.files.length > 0) {
      inputGantiFoto.disabled = false;
    }
  });
}

document.addEventListener('DOMContentLoaded', function() {
  handleFotoChange();
});

