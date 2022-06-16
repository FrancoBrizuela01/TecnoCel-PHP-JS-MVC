<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require '../html/partials/Head.php';
    ?>
</head>

<body>

    <div class="listaEmpleado">

        <?php
        require '../html/partials/navBar.php';
        ?>

        <div class="Divcontainer" id="lista_empleados">
            <a href="../controllers/AltaAdelantos.php"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">ALTA DE ADELANTOS</button></a>
            <h2>LISTA DE ADELANTOS:</h2>
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DNI</th>
                    <th>FECHA</th>
                    <th>CANTIDAD</th>
                    <th>ACCIONES</th>
                </tr>

                <?php foreach ($this->empleados as $e) { ?>
                    <tr>
                        <td><?= htmlentities($e['nombre']) ?></td>
                        <td><?= htmlentities($e['apellido']) ?></td>
                        <td><?= htmlentities($e['dni']) ?></td>
                        <td><?= htmlentities($e['fecha']) ?></td>
                        <td><?= htmlentities($e['cantidad']) ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn-eliminar" onclick="btnEliminarAdelanto(<?= $e['codigo_adelanto'] ?>)">ELIMINAR</button>

                                <!-- <button class="btn-modificar" onclick="btnModificarEmpleado(<?= $a['codigo_empleado'] ?>, '<?= $a['nombre'] ?>', '<?= $a['apellido'] ?>', <?= $a['dni'] ?>, <?= $a['sueldo'] ?>, '<?= $a['direccion'] ?>', <?= $a['altura'] ?>, <?= $a['telefono'] ?>)">MODIFICAR</button> -->
                            </div>
                        </td>
                    <?php } ?>
                    </tr>
            </table>
        </div>



    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>