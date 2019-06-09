<?php
class viewsModelssB{

    public function obtner_views_models($views){
        $listBlack= ["inicio","login","gobernante","misionVision","noticias","obrasProyectos",
            "organigrama","planDesarrollo","slider","usuario","salir"];

        if (in_array($views,$listBlack)){
            if (is_file("./views/contenidos/".$views.".php")){
                $contenido="./views/contenidos/".$views.".php";
            }
            else{
                $contenido="login";
            }
        }elseif ($views=="login"){
            $contenido="login";
        }elseif ($views=="index"){
            $contenido="login";
        }else{
            $contenido="login";
        }

        return $contenido;

    }
}