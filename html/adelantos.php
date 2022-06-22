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

                                <button class="btn-modificar" onclick="btnModificarAdelanto( <?= $e['codigo_adelanto'] ?>,<?= $e['codigo_empleado'] ?>,'<?= $e['fecha'] ?>', <?= $e['cantidad'] ?>)">MODIFICAR</button>
                            </div>
                        </td>
                    <?php } ?>
                    </tr>
            </table>
        </div>

        <div class="mod-empleados" id="modificacion-producto">
            <h2>Modificar adelanto</h2>
            <a href="#Divcontainer"><button name="Cancelar" value="Cancelar" class="btn-eliminar btn-cancelar-modificacion" id="btnCancelarModificar" onclick="btnCancelarModificacionAdelanto()">CANCELAR</button></a>
            <form id="formulario_modificacionAdelanto" method="post">
                <input type="text" name="id_adelanto" id="id-adelanto" class="inputId">
                <table>
                    <tr>
                        <th>EMPLEADO</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                        <th>ACCIONES</th>
                    <tr>
                        <td>
                            <select name="id_empleado" id="empleado">
                                <?php foreach ($this->empleados as $e) { ?>
                                    <option value="<?= $e['codigo_empleado'] ?>"> <?= htmlentities($e['nombre']) ?> <?= htmlentities($e['apellido']) ?></option>
                                <?php  } ?>
                            </select>
                        </td>
                        <td><input type="date" name="fecha" id="mod-fecha"></td>
                        <td><input type="number" name="cantidad" id="mod-cantidad"></td>
                        <td class="tdAcciones">
                            <button type="submit" class="btn-modificar" name="Modificar" value="Modificar" id="guardarModificar" onclick="btnGuardarModificacionAdelanto()">GUARDAR</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>