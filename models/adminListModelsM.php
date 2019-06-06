<?php
require_once "conexion.php";

class adminListModelssM {


    /*public function guardarObrasProyectosModels($datosModel){
        $stmt=Conexion::conectar()->prepare("INSERT INTO obras_proy (titulo_op,codigo_op,ruta_op,contenido_op,estado)
                                            VALUES (:tituloOP,codigoOP,:rutaOP,:contenidoOP,:estadoOP)");
        $stmt->bindParam(":tituloOP",$datosModel["OPtitulo"],PDO::PARAM_STR);
        $stmt->bindParam(":codigoOP",$datosModel["OPcodigo"],PDO::PARAM_STR);
        $stmt->bindParam(":rutaOP",$datosModel["OPruta"],PDO::PARAM_STR);
        $stmt->bindParam(":contenidoOP",$datosModel["OPcontenido"],PDO::PARAM_STR);
        $stmt->bindParam(":estadoOP",$datosModel["OPcontenido"],PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->close();
        return $stmt;

    }*/
    public function guardarOPModel($datosModel){
        $stmt=Conexion::conectar()->prepare("INSERT INTO obras_proy (titulo_op,codigo_op,ruta_op,contenido_op,estado)
                                            VALUES (:titulo,:codigo,:ruta,:contenido,:estado)");
        $stmt->bindParam(":titulo",$datosModel["optitulo"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosModel["opcodigo"],PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$datosModel["opruta"],PDO::PARAM_STR);
        $stmt->bindParam(":contenido",$datosModel["opcontenido"],PDO::PARAM_STR);
        $stmt->bindParam(":estado",$datosModel["opestado"],PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->close();
        return $stmt;

    }



}