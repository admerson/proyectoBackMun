<?php

/*if ($peticionAjax){
    require './core/mainModel.php';
}else{
    require './core/mainModel.php';
}*/
require_once "conexion.php";

class loginModelssB extends Conexion{

    public function ingresoUsuarioModelsB($datosModel){
        $stmt = Conexion::conectar()->prepare("SELECT dni_usuario, contr_usuario FROM usuario
                                                  WHERE dni_usuario = :usuari AND contr_usuario=:pass");
        $stmt->bindParam(":usuari", $datosModel["loginUsuar"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $datosModel["loginPass"], PDO::PARAM_STR);
        $stmt->execute();
        /*-------------*/
        return $stmt->fetch();
        $stmt->close();

        //return $stmt;
    }

}
