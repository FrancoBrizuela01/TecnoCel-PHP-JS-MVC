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
            <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">NUEVO EMPLEADO</button></a>
            <h2>LISTA DE EMPLEADOS:</h2>
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DNI</th>
                    <th>SUELDO</th>
                    <th>DIRECCION</th>
                    <th>ALTURA</th>
                    <th>TELEFONO</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <?php foreach ($this->empleados as $e) { ?>
                <tr>
                    <td><?= htmlentities($e['nombre']) ?></td>
                    <td><?= htmlentities($e['apellido']) ?></td>
                    <td><?= htmlentities($e['dni']) ?></td>
                    <td><?= htmlentities($e['sueldo']) ?></td>
                    <td><?= htmlentities($e['direccion']) ?></td>
                    <td><?= htmlentities($e['altura']) ?></td>
                    <td><?= htmlentities($e['telefono']) ?></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn-eliminar" onclick="btnEliminarEmpleado(<?= $e['codigo_empleado'] ?>)">ELIMINAR</button>
                            <button class="btn-modificar" onclick="btnModificarEmpleado(<?= $e['codigo_empleado'] ?>, '<?= $e['nombre'] ?>', '<?= $e['apellido'] ?>', <?= $e['dni'] ?>, <?= $e['sueldo'] ?>, '<?= $e['direccion'] ?>', <?= $e['altura'] ?>, <?= $e['telefono'] ?>)">MODIFICAR</button>
                        </div>


                    </td>
                <?php } ?>
                </tr>
            </table>

        </div>

        <div class="mod-empleados" id="new-empleado">
            <h2>Nuevo empleado:</h2>
            <form method="post">
                <table>
                    <tr>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>DNI</th>
                        <th>SUELDO</th>
                        <th>DIRECCION</th>
                        <th>ALTURA</th>
                        <th>TELEFONO</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nombre" id="nombre" maxlenght="20" value=""></td>
                        <td><input type="text" name="apellido" id="apellido" value=""></td>
                        <td><input type="number" name="dni" id="dni" value=""></td>
                        <td><input type="number" name="sueldo" id="sueldo" value=""></td>
                        <td><input type="text" name="direccion" id="direccion" value=""></td>
                        <td><input type="number" name="altura" id="altura" value=""></td>
                        <td><input type="number" name="telefono" id="telefono" value=""></td>
                        <td class="tdAcciones">
                            <button type="submit" class="btn-modificar" name="nuevo" value="nuevo">CONFIRMAR</button>
                            <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="mod-empleados" id="modificacion-producto">
            <h2>Modificar empleado</h2>
            <a href="#Divcontainer"><button name="Cancelar" value="Cancelar" class="btn-eliminar btn-cancelar-modificacion" id="btnCancelarModificar" onclick="btnCancelarModificacion()">CANCELAR</button></a>
            <form id="formulario_modificacion">
                <input type="text" name="id" id="mod-id" value="" class="inputId">
                <table>
                    <tr>
                        <th>NUEVO NOMBRE</th>
                        <th>NUEVO APELLIDO</th>
                        <th>NUEVO DNI</th>
                        <th>NUEVO SUELDO</th>
                        <th>NUEVA DIRECCION</th>
                        <th>NUEVA ALTURA</th>
                        <th>NUEVO TELEFONO</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nombre" id="mod-nombre" value=""></td>
                        <td><input type="text" name="apellido" id="mod-apellido" value=""></td>
                        <td><input type="number" name="dni" id="mod-dni" value=""></td>
                        <td><input type="number" name="sueldo" id="mod-sueldo" value=""></td>
                        <td><input type="text" name="direccion" id="mod-direccion" value=""></td>
                        <td><input type="number" name="altura" id="mod-altura" value=""></td>
                        <td><input type="number" name="telefono" id="mod-telefono" value=""></td>
                        <td class="tdAcciones">
                            <button type="submit" class="btn-modificar" name="Modificar" value="Modificar" id="guardarModificar" onclick="btnGuardarModificacion()">GUARDAR</button>
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