var redimensionar = $('#preview').croppie({
  enableExif: true, 
  enableOrientation: true,
  viewport: {
    width: 150,
    height: 150,
    type : 'square'
  },
  boundary: {
    width: 300,
    height: 300
  }
});

$('#img-card-user').on('change',function(){
  // Ler de forma assincrona os arquivos
  var reader = new FileReader();

  reader.onload = function(e) {
    console.log(e)
    redimensionar.croppie('bind', {
      url: e.target.result
      
    });
  }

  // O metodo  é usado para ler arquivo tipo blob ou file
  reader.readAsDataURL(this.files[0])
});

$('#btnCadUser').on('click', function(){
  redimensionar.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function(img){
    $.ajax({
      url: "upload.php",
      type: 'post',
      data: {
        "imagem" : img
      }
    })
    $('.img-cad-user').attr("src", img);
  });
})