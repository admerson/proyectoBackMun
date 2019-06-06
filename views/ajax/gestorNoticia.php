<?php
require_once "../../controllers/GestorNoticiasC.php";
class Ajax{
    public $imagenTemporal;
    public function gestorArticulosAjax(){
        $datos=$this->imagenTemporal;
        //echo $datos;
        $respuesta= GestorArticulossC::mostrarImagenController($datos);
        echo $respuesta;
    }
}


#----------objetos-----------
if (isset($_FILES["imagen"]["tmp_name"])){
    $a=new Ajax();
    $a->imagenTemporal=$_FILES["imagen"]["tmp_name"];
    $a->gestorArticulosAjax();

}