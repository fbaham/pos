// SUBIENDO FOTO DE USUARIO
$(".newPhoto").change(function(){
  var img = this.files[0];
  console.log("img", img);
  // VALIDAR FORMATO DE IMAGEN
  if (img["type"] != "image/jpeg" && img["type"] != "image/png"){
    $(".newPhoto").val("");
    swal({
      title: "Error al subir la imagen",
      text: "Formato de imagen no aceptado, debe ser JPG o PNG.",
      type: "error",
      confirmButtonText: "Cerrar"
    });
  }else if (img["size"] > 2000000) {
    $(".newPhoto").val("");
    swal({
      title: "Error al subir la imagen",
      text: "La imagen no debe pesar más de 2 MB.",
      type: "error",
      confirmButtonText: "Cerrar"
    });
  } else {

    var dataImg = new FileReader;
    dataImg.readAsDataURL(img);
    $(dataImg).on("load", function(event){
      var pathImg = event.target.result;
      $(".preview").attr("src", pathImg);

    })
  }
})
