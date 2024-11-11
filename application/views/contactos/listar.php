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
    <?php echo $menu ?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 60px;">
            <div class="col-md-4">
                <h2 class="text-center">Contactos</h2>
                <form method="POST" action="<?php echo site_url("contactos/agregar");?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Guardar</button>
                </form>
                <?php if (!empty($contactos)) { ?>
                <table class="table mt-3">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contactos as $contacto) { ?>
                        <tr>
                            <td><?php echo $contacto['contacto_apellido']; ?></td>
                            <td><?php echo $contacto['contacto_nombre']; ?></td>
                            <td><?php echo $contacto['contacto_email']; ?></td>
                            <td><?php echo $contacto['contacto_telefono']; ?></td>
                            <td>
                                <a href="<?php echo site_url('contactos/eliminar/' . $contacto['contacto_id']); ?>" onclick="return confirm('¿Está seguro de eliminar este contacto?');">
                                    <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                    <div class="alert alert-secondary" role="alert">
                        No se han cargado datos
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>