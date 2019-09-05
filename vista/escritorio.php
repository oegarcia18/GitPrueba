<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if ($_SESSION['id_usuario'] >= 1) {
    ?>

    <html>

        <head>

            <title>Escritorio</title>

            <!-- Archivo donde se enlace el style de Boostrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

            <!-- Archivo CSS personalizado -->
            <link rel="stylesheet" href="../public/style/style.css">

            <!-- Script JQuery -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

            <!-- Script FontAwesome-->
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        </head>

        <body>

            <div class="card">

                <div class="card-header text-center">

                    <label><?php echo$_SESSION['nombre']; ?></label>

                </div>

                <div class="card-body text-center">

                    <form id="form" name="form" method="POST">

                        <div class="alert alert-primary text-center" role="alert">

                            <input type="hidden" id="user_id" value="<?php echo$_SESSION['id_usuario']; ?>">

                            <div class="form-group">

                                <label for="txt_usuario"><i class="fa fa-user"></i> Usuario</label>
                                <input type="text" class="form-control text-center" id="usuario_txt" placeholder="Usuario" required="">

                            </div>

                            <div class="form-group">

                                <label for="txt_nombre"><i class="fa fa-user"></i> Nombre Completo</label>
                                <input type="text" class="form-control text-center" id="nombre_txt" placeholder="Nombre Completo" required="">

                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Editar</button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Script de Boostrap -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

            <!-- Script Personalizado -->
            <script src="../public/js/escritorio.js"></script>

        </body>

    </html>

    <?php
} else {
    require 'login.html';
}

