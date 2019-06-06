<link rel="stylesheet" href="views/css/log.css">

<div class="container">
    <div class="title-box">
        <h1><span>Backend </span>M.Andarapa</h1>
        <div class="title-border title-border-left"></div>
        <div class="title-border title-border-right"></div>
        <section class="row justify-content-center">
            <div class="box">
                <h3>Iniciar seccion</h3>
                <!--            <form action="./login/auntenticar.php" method="post">-->
                <form  method="post" action="">
                    <div class="inputBox">
                        <input type="text" name="usuarioIngreso" required>
                        <label for="">Usuario</label>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="passwordIngreso" required>
                        <label for="">Contraseña</label>
                    </div>

                    <?php
                    if (isset($_POST['usuarioIngreso'])&& isset($_POST['passwordIngreso'])){

                        require_once "./controllers/loginControllersB.php";
                        $log = new loginControllerssB();
                        echo $log->iniciar_session_controller();
                    }



                    ?>

                    <input type="submit" class="btn btn-primary btn-block" >
                </form>

                <hr >

            </div>

        </section>

    </div>

</div>

