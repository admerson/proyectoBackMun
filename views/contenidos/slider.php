<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Slider <small></small></h1>
    </div>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates</p>
</div>
<hr>

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
                                            <input class="form-control" type="text" name="titleSlider">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 text-center">

                                            <label class="control-label">Imagen</label>
                                            <input class="form-control " type="file" id="subirFotoSlider" name="imagen">
                                             <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB</p>


                                    </div>
                                    <div class="col-xs-12 col-sm-12">

                                        <div id="arrastreImagenArticulo">
                                            <!--                <div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>
                                            -->            </div>


                                    </div>

                                   <!-- <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <input type="file" name="img">
                                            <div class="input-group">
                                                <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen de Gobernante">
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                                        <i class="fas fa-image" aria-hidden="true"></i>
                                                      <i class="zmdi zmdi-photo-size-select-large" aria-hidden="true"></i>
                                                    </button>
                                                  </span>
                                            </div>
                                            <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB</p>

                                        </div>
                                    </div>-->
                                    <hr>
                                    <div class="col-xs-12 col-sm-12">
                                        <p class="text-center">
<!--                                            <button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
-->                                         <input type="submit" class="btn btn-info btn-raised btn-sm" id="guardarSlider" value="Guardar Slider">
<!--                                            <input type="submit" id="guardarArticulo" class="btn btn-primary" value="guardar imagen">
-->
                                        </p>
                                    </div>
                                </form>


                                <?

                                //require_once "./controllers/sliderControllersC.php";
                                $crearSlider = new GestorSlidersC();
                                $crearSlider->guardarSliderController();
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
                <nav class="tab-pane fade active in" >




                    <nav class="text-center">
                        <ul class="pagination pagination-sm">
                            <li class="disabled"><a href="#!">«</a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li><a href="#!">2</a></li>
                            <li><a href="#!">3</a></li>
                            <li><a href="#!">4</a></li>
                            <li><a href="#!">5</a></li>
                            <li><a href="#!">»</a></li>
                        </ul>
                    </nav>
                </div>
            </div>


        </div>
    </div>
</div>