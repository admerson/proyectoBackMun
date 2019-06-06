<?php
/**
 * User: Cardenas
 * Date: 31/05/2019
 * Time: 18:22
 */
if ($peticionAjax){
    require '../core/configAPP.php';
    //require 'configAPP.php';
}else{
    require './core/configAPP.php';
    //require 'configAPP.php';
}

class mainModels{

    public function conectar(){
        $enlace = new PDO(SGBD,USER,PASS);
        //$enlace = new PDO("mysql:host=localhost;dbname=muniandarapa","root","cardenas");
        //var_dump($enlace);
        return $enlace;
    }
    protected function ejecutar_consulta_simple($consulta){
        $respuesta = self::conectar()->prepare($consulta);
        $respuesta->execute();
        return $respuesta;
    }
    /*----------  Funcion para encriptar claves  -------------------------------------*/
    public function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    /*-----------------------------GENERAR CODIGO ALEATORIO-------------------------------------------*/
    protected function generar_codigo_aleatorio($letra,$longitud,$num){
        for ($i=1;$i<=$longitud;$i++) {
            $numero = rand(0,9);
            $letra.=$numero;
        }
        return $letra.$num;
    }
    /*------------------------------------LIMPIAR CADENA-------------------------------------------*/
    protected function limpiar_cadena($cadena){
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        $cadena=str_ireplace("<script>","",$cadena);
        return $cadena;
    }
    /*----------  Funcion para desencriptar claves ----------------------------------*/
    public function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

}
$a=new mainModels();
$a->conectar();