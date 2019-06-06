var imagen="";
var imagenSize ="";
var imagenType = "";
$("#subirFotoSlider").change(function () {

    imagen = this.files[0];
    console.log('imagen',imagen);
    imagenSize=imagen.size;
    console.log('imagenSize',imagenSize);
    imagenType=imagen.type;
    console.log('imagenType',imagenType);

    if (Number(imagenSize) > 10000000){
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>')
    }
    else {
        $(".alerta").remove();
    }
    //validar tipo de imagen
    if (imagenType == "image/jpeg" || imagenType =="image/png"){
        $(".alerta").remove();
    }else {
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb2</div>')

    }
    if (Number(imagenSize) < 10000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
        var datos = new FormData();
        datos.append("imagen", imagen)

    }
    $.ajax({

        url: "views/ajax/gestorSlider.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {

            $("#arrastreImagenArticulo").before('<img src="views/assets/img/status.gif" id="status">');

        },
        success: function (respuesta) {
            $("#status").remove();

            if(respuesta == 0){

                $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

            }else{

                $("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

            }
        }


    })

})