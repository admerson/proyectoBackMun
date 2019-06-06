<?php
require_once "conexion.php";
class GestorNoticiassM{

    public function guardarNoticiaModel($datosModel){
        $stmt=Conexion::conectar()->prepare("INSERT INTO noticias (titulo_noti,introduccion_noti,ruta,contenido)
                                            VALUES (:titulo,:introduccion,:ruta,:contenido)");
        $stmt->bindParam(":titulo",$datosModel["atitulo"],PDO::PARAM_STR);
        $stmt->bindParam(":introduccion",$datosModel["aintroduccion"],PDO::PARAM_STR);
        $stmt->bindParam(":ruta",$datosModel["aruta"],PDO::PARAM_STR);
        $stmt->bindParam(":contenido",$datosModel["acontenido"],PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->close();
        return $stmt;

    }


    public function mostrarNoticiaModel($tabla){
        $stmt=Conexion::conectar()->prepare("SELECT id_noticias,titulo_noti,introduccion_noti,ruta,contenido
         FROM $tabla ORDER BY id_noticias DESC ");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }

}