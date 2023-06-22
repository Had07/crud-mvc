<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php y mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4ac95f1c12.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Estas seguro de elimiar este registro?");
            return respuesta
        }
    </script>
    <h1 class="text-center">HOLA MUNDO</h1>
    <?php
    include "Models/conexion.php";
    include "Controllers/eliminar_registro.php";
    ?>

    <div class="container-fluid row">
        <form action="Controllers/insert.php" onsubmit="return validateForm()" class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Personas</h3>
            <?php
            // include "Controllers/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required>
            </div>
            <div class="mb-3">
                <label class="form-label">DNI de la persona</label>
                <!-- <input class="form-control" id="dni" onblur="caracter(this)" name="dni" maxlength="8" required> -->
                <input class="form-control" id="myInput"  oninput="validateInput()" name="dni" maxlength="8" minlength="8" required>
                <span id="errorMessage" style="color: red; display: none;">Sintaxis Incorrecta</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de nacimiento</label>
                <input type="date" class="form-control" max="2005-01-01" id="birthdate" name="fecha" required>
                <span id="errorMessage" style="color: red; display: none;"> Debe ser mayor a 18 años</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo"required>
            </div>
            <button type="submit" class="btn btn-primary" id="submitButton" name="btnregistrar" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NAC</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "Models/conexion.php";
                    $sql = $conexion->query("SELECT * FROM persona");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id_persona ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->dni ?></td>
                            <td><?= $datos->fecha_nac ?></td>
                            <td><?= $datos->correo ?></td>
                            <td>
                                <a href="modificar.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square">MODIFICAR</i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>"><i class="btn btn-small btn-danger"><i class="fa-solid fa-trash">ELIMINAR</i></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="js/validacion.js"></script>
</body>

</html>