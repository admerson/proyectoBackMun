<?php
require_once "./models/adminListModelsM.php";

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


    public function vistaUsuariosController($pagina,$registros){

        $tabla="";

        $pagina= (isset($pagina)&&$pagina>0) ?(int)$pagina:1;
        //------------contador de datos en la base de datos---------------------
        $inicio=($pagina>0) ?(($pagina*$registros)-$registros) :0;

        $conexion=adminListModelssM::conectar();

        $datos=$conexion->query("
        SELECT SQL_CALC_FOUND_ROWS * FROM obras_proy WHERE id_op!='1'
         ORDER BY id_op DESC LIMIT $inicio,$registros
        ");

        $datos=$datos->fetchAll();

        $total=$conexion->query("SELECT FOUND_ROWS()");
        $total=(int)$total->fetchColumn();
        //total de numeros de paginas
        $Npaginas=ceil($total/$registros);

        /*-------------------------paginando en una lista---------------------------*/
        $tabla.='<div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">TITULO</th>
                        <th class="text-center">CODIGO</th>
                        <th class="text-center">RUTA</th>
                        <th class="text-center">CONTENIDO</th>
                        <th class="text-center">ESTADO</th>
                        <th class="text-center">ELIMINAR</th>
                    </tr>
                    </thead>
                    <tbody>
                    ';
        if ($total>=1 && $pagina<=$Npaginas){
            $contador=$inicio+1;
            foreach ($datos as $rows){
                $tabla.='<tr>
                            <td>'.$contador.'</td>
                            <td>'.$rows['id_op'].'</td>
                            <td>'.$rows['titulo_op'].'</td>
                            <td>'.$rows['codigo_op'].'</td>
                            <td>'.$rows['ruta_op'].'</td>
                            <td>'.$rows['contenido_op'].'</td>
                            <td>'.$rows['estado'].'</td>
                            
                            <td>
                                <form>
                                    <button type="submit" class="btn btn-danger btn-raised btn-xs">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        ';

                $contador++;
            }
        }else{
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

        if ($total>=1 && $pagina<=$Npaginas){


        }




        return  $tabla;



    }

}