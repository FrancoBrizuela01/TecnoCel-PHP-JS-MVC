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

        <div class="Divcontainer" id="Divcontainer">
            <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">NUEVO EMPLEADO</button></a>
            <h2>LISTA DE EMPLEADOS:</h2>
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DNI</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <?php foreach ($this->empleados as $e) { ?>
                <tr>
                    <td><?= htmlentities($e['nombre']) ?></td>
                    <td><?= htmlentities($e['apellido']) ?></td>
                    <td><?= htmlentities($e['dni']) ?></td>
                    <td>
                        <button class="btn-eliminar"><a href="../controllers/Eliminar-Empleado.php?id=<?= htmlentities($e['codigo_empleado']) ?>">ELIMINAR </a></button>
                        <a href="#modificacion-producto"><button onclick="mostrarModificarProducto()" class="btn-modificar"> MODIFICAR </button></a>
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
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nombre" id="nombre" maxlenght="20" value=""></td>
                        <td><input type="text" name="apellido" id="apellido" value=""></td>
                        <td><input type="number" name="dni" id="dni" value=""></td>
                        <td>
                            <button type="submit" class="btn-modificar" name="nuevo" value="nuevo">CONFIRMAR</button>
                            <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="mod-empleados" id="modificacion-producto">
            <h2>Modificar empleado</h2>
            <form method="post">
                <table>
                    <tr>
                        <th>SELECCIONE UN EMPLEADO</th>
                        <th>NUEVO NOMBRE</th>
                        <th>NUEVO APELLIDO</th>
                        <th>NUEVO DNI</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td>
                            <select id="id" name="id">
                                <?php foreach ($this->empleados as $e) { ?>
                                    <option value="<?= $e['codigo_empleado'] ?>"><?= htmlentities($e['nombre']) ?></option>
                                <?php  } ?>
                            </select>
                        </td>
                        <td><input type="text" name="nombre" id="nombre" value=""></td>
                        <td><input type="text" name="apellido" id="apellido" value=""></td>
                        <td><input type="number" name="dni" id="dni" value=""></td>
                        <td id="">
                            <a><button type="submit" name="Modificar" value="Modificar" class="btn-modificar">GUARDAR</button></a>
                            <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
    <script src="../html/js/app.js"></script>
</body>

</html>