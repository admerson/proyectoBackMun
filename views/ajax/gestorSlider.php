<?php

require_once "../../controllers/sliderControllersC.php";

class Ajax{
    public $imagenTemporal;
    public function gestorSliderAjax(){
        $datos=$this->imagenTemporal;
        //echo $datos;
        $respuesta= GestorSlidersC::mostrarImagenController($datos);
        echo $respuesta;
    }
}

#----------objetos-----------
if (isset($_FILES["imagen"]["tmp_name"])){
    $a=new Ajax();
    $a->imagenTemporal=$_FILES["imagen"]["tmp_name"];
    $a->gestorSliderAjax();

}