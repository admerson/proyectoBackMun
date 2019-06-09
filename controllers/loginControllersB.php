<?php
/*if ($peticionAjax){
    require './models/loginModelsB.php';
}else{
    require './models/loginModelsB.php';
    //require './core/mainModel.php'
}*/
require './models/loginModelsB.php';

class loginControllerssB extends loginModelssB{

    public function iniciar_session_controller(){

        if (isset($_POST["usuarioIngreso"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])) {
                /*--------------------------------------*/

                $datosController = array("loginUsuar" => $_POST["usuarioIngreso"], "loginPass" => $_POST["passwordIngreso"]);

                $respuesta = loginModelssB::ingresoUsuarioModelsB($datosController);

                /*-------------------------------------*/
                if ($respuesta["dni_usuario"] == $_POST["usuarioIngreso"] && $respuesta["contr_usuario"] == $_POST["passwordIngreso"]) {
                    //$row = $respuesta->fetch();
                    session_start(["name"=>"MA"]);
                    $_SESSION["validar"] = true;
                    header("location:inicio");
                }
                else {

                    echo '<div class="alert alert-danger error_login" >Usuario o contraseña incorrecto</div><hr>';

                }

            }
        }

    }



    public function forzar_cierre_session(){
        session_destroy();
        header("location:login");
    }

}