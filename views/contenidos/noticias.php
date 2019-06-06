<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Noticias <small></small></h1>
    </div>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates</p>
</div>


<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#new" data-toggle="tab">Agregar Nuevo</a></li>
                <li><a href="#lista" data-toggle="tab">Lista de Noticias</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">


                            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div id="agregarArtículo">

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="text" placeholder="Título de Noticia" class="form-control" name="Notitulo" required>

                                        <textarea name="Nointroduccion" id="" cols="30" rows="5" placeholder="Introducción de Noticia" class="form-control" required></textarea>

                                        <input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

                                        <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

                                        <div id="arrastreImagenArticulo">
                                            <!--                <div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>
                                            -->            </div>

                                        <textarea name="Nocontenido" id="" cols="30" rows="10" placeholder="Contenido de Noticia" class="form-control"  required></textarea>

                                        <input type="submit" id="guardarArticulo" class="btn btn-primary" value="guardar imagen">
                                    </form>

                                </div>

                                <?

                                // require_once "./controllers/GestorArticulosC.php";
                                $crearArticulo = new GestorArticulossC();
                                $crearArticulo->guardarNoticiaController();
                                ?>




                                <hr>


                                <ul id="editarArticulo">
                                    <?

                                    $MostrarNoticia = new GestorArticulossC();
                                    $MostrarNoticia->mostrarNoticiaController();


                                    ?>

                                </ul>


                            </div>






                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="lista">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Introduccion</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Contenido</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Andahuaylas 2019...........</td>
                                <td>Andahuaylas comienza el rendicion de cuenta de 100 dias ...</td>
                                <td>Foto  1</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid </td>

                                <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Andarapa faina del canal ...</td>
                                <td>Andarapa faina del canal del distrito de Andarapa... </td>
                                <td>Foto 2</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis ea facere fugit </td>
                                <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Andarapa faina del canal ...</td>
                                <td>Andarapa faina del canal del distrito de Andarapa... </td>
                                <td>Foto 3</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis ea facere fugit </td>
                                <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Andahuaylas 2019...........</td>
                                <td>Andahuaylas comienza el rendicion de cuenta de 100 dias ...</td>
                                <td>Foto  4</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid </td>

                                <td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
                                <td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="pagination pagination-sm">
                            <li class="disabled"><a href="#!">«</a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li><a href="#!">2</a></li>
                            <li><a href="#!">3</a></li>
                            <li><a href="#!">4</a></li>
                            <li><a href="#!">5</a></li>
                            <li><a href="#!">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>