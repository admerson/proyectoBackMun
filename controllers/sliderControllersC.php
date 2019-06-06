<?php
//require_once "./models/sliderModelsM.php";
//require_once "./models/conexion.php";

class GestorSlidersC {

    public function mostrarImagenController($datos){
        list($ancho,$alto)=getimagesize($datos);
        if($ancho < 1024 || $alto < 768){
            echo 0;
        }
        else{
            $aleatorio = mt_rand(100, 999);
            $ruta = "../../views/images/slider/temp/slider".$aleatorio.".jpg";

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

    #---------------guardar Slider
    public function guardarSliderController(){
        if (isset($_POST["titleSlider"])){

            $imagen=$_FILES["imagen"]["tmp_name"];
            //echo $imagen;
            /*---------------borrar----------------*/
            $borrar=glob("views/images/slider/temp/*");
            foreach ($borrar as $file){
                unlink($file) ;
            }
            /*-------------------borrar-------------------------*/
            list($ancho,$alto)=getimagesize($imagen);


            $aleatorio = mt_rand(100, 999);
            $ruta = "views/images/slider/slider".$aleatorio.".jpg";
            $nuevo_ancho = 1024 * 0.5;
            $nuevo_alto = 668 * 0.5;
            $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
            $origen = imagecreatefromjpeg($imagen);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
            imagejpeg($destino, $ruta);

            $datosController = array("stitulo" => $_POST["titleSlider"],
                "sruta" => $ruta
            );
            $respuesta = GestorsliderM::guardarSliderModel($datosController);


            echo '<script>
                swal({
                      title: "¡OK!",
                      text: "¡El Slider ha sido creado correctamente!",
                      type: "success",
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                },
                function(isConfirm){
                         if (isConfirm) {	   
                            window.location = "slider";
                          } 
                });
                </script>';







        }

    }


    public function mostrarSlidersTablas($pagina,$registros){

        $tabla="";

        $pagina=(isset($pagina)&& $pagina>0) ?(int)$pagina:1;

        //------------contador de datos en la base de datos---------------------
        $inicio=($pagina>0) ?(($pagina*$registros)-$registros) :0;

        $conexion=Conexion::conectar();

        $datos=$conexion->query("
        SELECT SQL_CALC_FOUND_ROWS * FROM slider WHERE idslider!='1'
         ORDER BY idslider DESC LIMIT $inicio,$registros
        ");

        $datos=$datos->fetchAll();

        $total=$conexion->query("SELECT FOUND_ROWS()");
        $total=(int)$total->fetchColumn();
        //total de numeros de paginas
        $Npaginas=ceil($total/$registros);

        $tabla.='<div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
        if ($total>=1 && $pagina<=$Npaginas){
            $contador=$inicio+1;
            foreach ($datos as $rows) {
                $tabla.='<tr>
                                <td>'.$contador.'</td>
                                <td>'.$rows["idslider"].'</td>
                                <td>'.$rows["titulo_slider"].'</td>
                                <td>'.$rows["ruta_slider"].'</td>

                                <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>';
                $contador++;
            }
        }
        else{
            /*---------------------para eliminar el mensaje que muestra-----------------------*/
            if($total>=1){
                $tabla.='
        <tr>
            <td colspan="5"></td>
        
        </tr>
        ';
            }else{
                $tabla.='
        <tr>
            <td colspan="5">No hay registros en el sistema</td>
        
        </tr>
        ';
            }

        }
        $tabla.='</tbody></table></div>';


        return $tabla;

    }


}