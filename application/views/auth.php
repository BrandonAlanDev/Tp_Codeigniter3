<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=TITULO_APP?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="col-md-4">
                <h2 class="text-center">Iniciar Sesión</h2>
                <?php 
                if($this->session->flashdata("OP")){
                    switch ($this->session->flashdata("OP")) {
                        case 'PROHIBIDO':
                            ?>
                            <div class="alert alert-info">
                                Tiene que identificarse primero!
                            </div>
                            <?php
                            break;
                        case 'INCORRECTO':
                            ?>
                            <div class="alert alert-info">
                                Usuario / Contraseña Incorrecta
                            </div>
                            <?php
                            break;
                        default:
                    }    
                }
                ?>
                <form method="POST" action="<?php echo site_url("auth/login");?>">
                    <div class="form-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">

                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>