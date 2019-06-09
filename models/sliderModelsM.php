<?php
require_once "conexion.php";

class GestorsliderM extends Conexion {

    public function guardarSliderModel($datosModel){

            $stmt=Conexion::conectar()->prepare("INSERT INTO slider (titulo_slider,ruta_slider)
                                            VALUES (:tituloSlider,:rutaSlider)");
            $stmt->bindParam(":tituloSlider",$datosModel["stitulo"],PDO::PARAM_STR);
            $stmt->bindParam(":rutaSlider",$datosModel["sruta"],PDO::PARAM_STR);
            $stmt->execute();
            //$stmt->close();
            return $stmt;



    }
}