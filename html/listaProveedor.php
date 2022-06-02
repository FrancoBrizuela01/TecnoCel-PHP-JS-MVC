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

        <div class="Divcontainer">
            <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">NUEVO PROVEEDOR</button></a>
            <h2>LISTA DE PROVEEDORES:</h2>
            <table>
                <tr>
                    <th>Nombre Empresa</th>
                    <th>Razón Social</th>
                    <th>Cuit</th>
                    <th>Dirección</th>
                    <th>Altura</th>
                    <th>Teléfono</th>
                    <th>ACCIONES</th>
                </tr>
                <?php foreach ($this->proveedores as $p) {  ?>
                    <tr>
                        <td><?= htmlentities($p['nombre_empresa']) ?></td>
                        <td><?= htmlentities($p['razon_social']) ?></td>
                        <td><?= htmlentities($p['cuit']) ?></td>
                        <td><?= htmlentities($p['direccion']) ?></td>
                        <td><?= htmlentities($p['altura']) ?></td>
                        <td><?= htmlentities($p['telefono']) ?></td>
                        <td>
                            <button class="btn-eliminar"><a href="../controllers/EliminarProveedor.php?id=<?= htmlentities($p['codigo_proveedor']) ?>">ELIMINAR </a></button>
                            <a href="#modificacion-producto"><button onclick="mostrarModificarProducto()" class="btn-modificar"> MODIFICAR </button></a>
                        </td>
                    </tr>
                <?php  } ?>
            </table>
        </div>



        <div class="mod-empleados" id="new-empleado">
            <h2>Nuevo Proveedor:</h2>
            <form method="post">
                <table>
                    <tr>
                        <th>Nombre Empresa</th>
                        <th>Razón Social</th>
                        <th>Cuit</th>
                        <th>Dirección</th>
                        <th>Altura</th>
                        <th>Teléfono</th>
                        <th>ACCIONES</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nombre_empresa" id="nombre_empresa" value=""></td>
                        <td><input type="text" name="razon_social" id="razon_social" value=""></td>
                        <td><input type="number" name="cuit" id="cuit" value=""></td>
                        <td><input type="text" name="direccion" id="direccion" value=""></td>
                        <td><input type="number" name="altura" id="altura" value=""></td>
                        <td><input type="number" name="telefono" id="telefono" value=""></td>
                        <td>
                            <button class="btn-modificar" type="submit" name="nuevo" value="nuevo">CONFIRMAR</button>
                            <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="mod-empleados" id="modificacion-producto">
            <h2>Modificar proveedor</h2>
            <form method="post">
                <table>
                    <tr>
                        <th>SELECCIONE UN PROVEEDOR</th>
                        <th>Nombre Empresa</th>
                        <th>Razón Social</th>
                        <th>Cuit</th>
                        <th>Dirección</th>
                        <th>Altura</th>
                        <th>Teléfono</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td>
                            <select id="id" name="id">
                                <?php foreach ($this->proveedores as $p) { ?>
                                    <option value="<?= htmlentities($p['codigo_proveedor']) ?>"><?= htmlentities($p['nombre_empresa']) ?></option>
                                <?php  } ?>
                            </select>
                        </td>
                        <td><input type="text" name="nombre_empresa" id="nombre_empresa" value=""></td>
                        <td><input type="text" name="razon_social" id="razon_social" value=""></td>
                        <td><input type="number" name="cuit" id="cuit" value=""></td>
                        <td><input type="text" name="direccion" id="direccion" value=""></td>
                        <td><input type="number" name="altura" id="altura" value=""></td>
                        <td><input type="number" name="telefono" id="telefono" value=""></td>
                        <td id="">
                            <a><button type="submit" name="Modificar" value="Modificar" class="btn-modificar">GUARDAR</button></a>
                            <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <script src="../html/js/app.js"></script>
</body>

</html>