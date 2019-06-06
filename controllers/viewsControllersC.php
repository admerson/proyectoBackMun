<?php

require_once "./models/viewsModelsM.php";
class viewsControllerssB extends viewsModelssB {


    public function obtner_plantilla_controlador(){
        return require_once  "./views/template.php";
    }

    public function obtner_views_controlador(){
        if (isset($_GET['action'])) {
            $ruta = explode("/", $_GET['action']);
            $respuesta = viewsModelssB::obtner_views_models($ruta[0]);
        } else {
            $respuesta = "login";
        }
        return $respuesta;

    }

}