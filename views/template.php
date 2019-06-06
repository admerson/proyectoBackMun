<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="views/css/main.css">

    <script src="views/js/jquery-3.1.1.min.js"></script>
    <script src="views/js/sweetalert2.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>

    <script src="views/js/jquery.dataTables.min.js"></script>

    <script src="views/js/material.min.js"></script>
    <script src="views/js/ripples.min.js"></script>
    <script src="views/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="views/js/main.js"></script>
    <script>$.material.init();</script>


</head>
<body>
 <?

 require_once "./controllers/viewsControllersC.php";
 $vt = new viewsControllerssB();
 $viewsR=$vt->obtner_views_controlador();
 if ($viewsR=="login"){
     require_once "./views/contenidos/login.php";
 }else{
     session_start(["name"=>"MA"]);
 ?>

 <?

/* <!-- SideBar -->*/

include "views/modules/navLateral.php";
?>

<!-- Content page-->
<section class="full-box dashboard-contentPage">
    <!-- NavBar -->
<?
include "views/modules/navTop.php";


require_once $viewsR;
?>
    <!-- Content page -->

</section>
<?}?>


<!--====== Scripts -->
 <script src="views/js/gestorNoticia.js"></script>
 <script src="views/js/gestorSlider.js"></script>
<!--<script src="./views/js/jquery-3.1.1.min.js"></script>
<script src="./views/js/sweetalert2.min.js"></script>
<script src="./views/js/bootstrap.min.js"></script>
<script src="./views/js/material.min.js"></script>
<script src="./views/js/ripples.min.js"></script>
<script src="./views/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="./views/js/main.js"></script>
<script>
    $.material.init();
</script>-->
</body>
</html>