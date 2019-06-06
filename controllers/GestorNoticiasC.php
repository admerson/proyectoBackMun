<?php
class GestorArticulossC {


    public function mostrarImagenController($datos){
        list($ancho,$alto)=getimagesize($datos);
        if($ancho < 1024 || $alto < 768){
            echo 0;
        }
        else{
            $aleatorio = mt_rand(100, 999);
            $ruta = "../../views/images/noticia/temp/noticia".$aleatorio.".jpg";

            $nuevo_ancho = 1024;
            $nuevo_alto = 768;

            $origen = imagecreatefromjpeg($datos);
            #imagecreatetruecolor — Crear una nueva imagen de color verdadero
            $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            #imagecopyresized() - copia una porción de una imagen a otra imagen.

            #bool imagecopyresized( $destino, $origen, int $destino_x, int $destino_y, int $origen_x, int $origen_y, int $destino_w, int $destino_h, int $origen_w, int $origen_h)
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            imagejpeg($destino, $ruta);
            echo $ruta;
        }
    }

    #---------------guardar Noticia
    public function guardarNoticiaController(){
        if (isset($_POST["Notitulo"])){

            $imagen=$_FILES["imagen"]["tmp_name"];
            //echo $imagen;
            /*---------------borrar----------------*/
            $borrar=glob("views/images/noticia/temp/*");
            foreach ($borrar as $file){
                unlink($file) ;
            }
            /*-------------------borrar-------------------------*/
            list($ancho,$alto)=getimagesize($imagen);


            $aleatorio = mt_rand(100, 999);

            $ruta = "views/images/noticia/noticia".$aleatorio.".jpg";

            $nuevo_ancho = 1024 * 0.5;
            $nuevo_alto = 668 * 0.5;
            $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            $origen = imagecreatefromjpeg($imagen);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            imagejpeg($destino, $ruta);

            $datosController = array("atitulo" => $_POST["Notitulo"],
                "aintroduccion" => $_POST["Nointroduccion"]."...",
                "aruta" => $ruta,
                "acontenido" => $_POST["Nocontenido"]);
            $respuesta = GestorNoticiassM::guardarNoticiaModel($datosController);


            echo '<script>
                swal({
                      title: "¡OK!",
                      text: "¡Noticia ha sido creado correctamente!",
                      type: "success",
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                },
                function(isConfirm){
                         if (isConfirm) {	   
                            window.location = "noticias";
                          } 
                });
                </script>';







        }

    }

    public function mostrarNoticiaController(){

        $respuesta=GestorNoticiassM::mostrarNoticiaModel("noticias");

        foreach ($respuesta as $row =>$item){
            echo '<li>
			<span>
			<i class="fa fa-times btn btn-danger"></i>
			<i class="fa fa-pencil btn btn-primary"></i>	
			</span>
			<img src="'.$item['ruta'].'" class="img-thumbnail">
			<h1>'.$item['titulo_noti'].'</h1>
			<p>'.$item['introduccion_noti'].'</p>
			<a href="#articulo'.$item['id_noticias'].'" data-toggle="modal">
			<button class="btn btn-default">Leer Más</button>
			</a>
			<hr>
			</li>
			
		    
		    
		    ';


          /*  <div id="articulo'.$item['id_noticias']. '" class="modal fade">

                <div class="modal-dialog modal-content">

                    <div class="modal-header" style="border:1px solid #ee0030">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">' .$item['titulo_noti'].'</h3>

                    </div>

                    <div class="modal-body" style="border:1px solid #eee">

                        <img src="'.$item['ruta'].'" width="100%" style="margin-bottom:20px">
                        <p class="parrafoContenido">'.$item['contenido'].'</p>

                    </div>

                    <div class="modal-footer" style="border:1px solid #eee">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

                </div>

            </div>*/

        }

    }


}