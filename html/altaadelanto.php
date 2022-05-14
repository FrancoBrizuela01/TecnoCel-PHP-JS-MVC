<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require '../html/partials/head.php';
    ?>
</head>

<body>

    <div class="listaEmpleado">
        <?php
        require '../html/Partials/Navbar.php';
        ?>

        <div class="Divcontainer" id="Divcontainer">
            <a href="../controllers/Adelantos.php"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="">VER LISTA DE ADELANTOS</button></a>
            <h2>AGREAGAR ADELANTO:</h2>
            <form action="" method="post">
                <table>
                    <tr>
                        <th>SELECCIONE UN EMPLEADO</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="empleado" id="empleado">
                                <?php foreach ($this->empleados as $e) { ?>
                                    <option value="<?= htmlentities($e['codigo_empleado']) ?>"> <?= htmlentities($e['nombre']) ?></option>
                                <?php  } ?>
                            </select>
                        </td>
                        <td><input type="date" name="fecha" id="fecha" value=""></td>
                        <td><input type="number" name="monto" id="monto" value=""></td>
                        <td><button type="submit" class="btn-modificar">CONFIRMAR</button>
                    </tr>
                    </tr>
                </table>
            </form>

        </div>



    </div>


    <script src="../html/js/app.js"></script>
</body>

</html>