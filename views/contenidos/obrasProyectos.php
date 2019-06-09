<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Obras y Proyectos <small></small></h1>
    </div>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates</p>
</div>

<?
require_once "./controllers/adminListControllersC.php";
$insAdmin=new adminListControllerssC();

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Titulo</label>
                                            <input class="form-control" type="text" name="titleObrasP" >
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo</label>
                                            <input class="form-control" type="text" name="codigoObrasP" >
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-xs-12 col-sm-12">
                                        <input type="file" name="imagen" id="subirFotoOP">

                                        <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB</p>

                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group label-floating">

                                            <select class="form-control" name="estadoObrasP">
                                                <option value="" disabled="" selected="">Estado</option>
                                                <option value="proyectado">Proyectado</option>
                                                <option value="ejecucion">Ejecución</option>
                                                <option value="ejecutado">Ejecutado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contenido</label>
                                            <textarea id="" name="contenidoObrasP" autofocus cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control"  maxlength="170" required > </textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-xs-12 col-sm-12">
                                        <p class="text-center">
                                            <input type="submit"  class="btn btn-info btn-raised btn-sm" value="Guardar Obras y Proyectos">
                                        </p>
                                    </div>
                                </form>


                                 <?

                                //require_once "./controllers/adminListControllersC.php";
                                $crearop = new adminListControllerssC();
                                $crearop->guardarObrasPControllers();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="lista">

                    <?php
                    $pagina=explode("/",$_GET['action']);
                    echo $insAdmin->vistaUsuariosController($pagina[1],10);
                    ?>

                </div>
            </div>


        </div>
    </div>
</div>