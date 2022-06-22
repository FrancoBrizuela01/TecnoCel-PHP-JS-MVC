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
            <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">NUEVO PROVEEDOR</button></a>
            <h2>LISTA DE PROVEEDORES:</h2>
            <table>
                <tr>
                    <th>Nombre</th>
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
                            <button class="btn-eliminar" onclick="btnEliminarProveedor(<?= $p['codigo_proveedor'] ?>)">ELIMINAR</button>
                            <button class="btn-modificar" onclick="btnModificarProveedor(<?= $p['codigo_proveedor'] ?>, '<?= $p['nombre_empresa'] ?>', '<?= $p['razon_social'] ?>', <?= $p['cuit'] ?>, '<?= $p['direccion'] ?>', <?= $p['altura'] ?>, <?= $p['telefono'] ?>)">MODIFICAR</button>
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
                        <th>Nombre</th>
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
            <a href="#Divcontainer"><button name="Cancelar" value="Cancelar" class="btn-eliminar btn-cancelar-modificacion" id="btnCancelarModificar" onclick="btnCancelarModificacionProveedor()">CANCELAR</button></a>
            <form id="formulario_modificacionProveedor">
                <input type=" text" name="id" id="mod-id-proveedor" value="" class="inputId">
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Razón Social</th>
                        <th>Cuit</th>
                        <th>Dirección</th>
                        <th>Altura</th>
                        <th>Teléfono</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nombre_empresa" id="nombre_empresa-mod" value=""></td>
                        <td><input type="text" name="razon_social" id="razon_social-mod" value=""></td>
                        <td><input type="number" name="cuit" id="cuit-mod" value=""></td>
                        <td><input type="text" name="direccion" id="direccion-mod" value=""></td>
                        <td><input type="number" name="altura" id="altura-mod" value=""></td>
                        <td><input type="number" name="telefono" id="telefono-mod" value=""></td>
                        <td class="tdAcciones">
                            <button type="submit" class="btn-modificar" name="Modificar" value="Modificar" id="guardarModificar" onclick="btnGuardarModificacionProveedor()">GUARDAR</button>
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