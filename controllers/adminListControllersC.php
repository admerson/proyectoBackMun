<?php
//require_once "./models/adminListModelsM.php";

class adminListControllerssC{

    public function guardarObrasPControllers(){

        if (isset($_POST["titleObrasP"])){

            $imagen=$_FILES["imagen"]["tmp_name"];
            //echo $imagen;
            /*---------------borrar----------------*/
            $borrar=glob("views/images/obrasProyectos/temp/*");
            foreach ($borrar as $file){
                unlink($file) ;
            }
            /*-------------------borrar-------------------------*/
            list($ancho,$alto)=getimagesize($imagen);


            $aleatorio = mt_rand(100, 999);
            $ruta = "views/images/obrasProyectos/obrasProyestos".$aleatorio.".jpg";
            $nuevo_ancho = 1024 * 0.5;
            $nuevo_alto = 668 * 0.5;
            $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            $origen = imagecreatefromjpeg($imagen);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            imagejpeg($destino, $ruta);

            /*$datosController = array("OPtitulo" => $_POST["titleOP"],
                "OPcodigo" => $_POST["codigoOP"],
                "OPruta" => $ruta,
                "OPcontenido" => $_POST["contenidoOP"],
                "OPcontenido"=>$_POST["contenidoOP"]);*/

            $datosController = array(
                "optitulo" => $_POST["titleObrasP"],
                "opcodigo" => $_POST["codigoObrasP"],
                "opruta" => $ruta,
                "opcontenido"=>$_POST["contenidoObrasP"],
                "opestado"=>$_POST["estadoObrasP"],
            );

            $respuesta = adminListModelssM::guardarOPModel($datosController);


            echo '<script>
                swal({
                      title: "¡OK!",
                      text: "¡Obras y Proyectos ha sido creado correctamente!",
                      type: "success",
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                },
                function(isConfirm){
                         if (isConfirm) {	   
                            window.location = "obrasProyectos";
                          } 
                });
                </script>';







        }


    }

}