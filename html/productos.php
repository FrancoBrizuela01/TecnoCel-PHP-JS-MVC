<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require '../html/partials/Head.php';
    ?>

</head>

<body>
    <?php
    require '../html/partials/navBar.php';
    ?>

    <div class="Divcontainer" id="lista_empleados">
        <div class="my-buttons" id="my-buttons"> <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">AGREGAR PRODUCTO</button></a>
            <button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarInputPorcentaje()">INGRESAR PORCENTAJE</button>
        </div>

        <div id="contenedorPorcentaje">
            <form id="formularioPorcentaje">
                <h2>Ingresar porcentaje:</h2>
                <input type="text" name="porcentaje" class="inputPorcentaje">
                <input type="submit" value="Ingresar" class="btn-modificar" onclick="enviarPorcentaje()">
                <button class="btn-eliminar" onclick="cancelarPorcentaje()">Cancelar</button>
            </form>
        </div>

        <h2>LISTA DE PRODUCTOS:</h2>
        <table>
            <tr>
                <th>DESCRIPCIÓN</th>
                <th>PROVEEDOR</th>
                <th>PRECIO COSTO</th>
                <th>PRECIO VENTA</th>
                <th>STOCK</th>
                <th>ACCIONES</th>
            </tr>
            <?php foreach ($this->productos as $p) { ?>
                <tr>
                    <td><?= htmlentities($p['descripcion']) ?></td>
                    <?php if ($p['razon_social'] == null) { ?>
                    <td>proveedor inexistente</td>
                <?php } else { ?>
                    <td><?= htmlentities($p['razon_social']) ?></td>
                <?php } ?>
                <td><?= htmlentities($p['precio_costo']) ?></td>
                <td><?= htmlentities($p['precio_venta']) ?></td>
                <td><?= htmlentities($p['stock']) ?></td>
                <td>
                    <div class="btn-group">
                        <button class="btn-eliminar" onclick="btnEliminarProducto(<?= $p['codigo_producto'] ?>)">ELIMINAR</button>
                        <button class="btn-modificar" onclick="btnModificarProducto(<?= $p['codigo_producto'] ?>, '<?= $p['descripcion'] ?>',<?= $p['precio_costo'] ?>, <?= $p['precio_venta'] ?>,<?= $p['stock'] ?>, <?= $p['codigo_proveedor'] ?>)">MODIFICAR</button>
                    </div>
                </td>
            <?php } ?>
                </tr>

        </table>
    </div>



    <div class="mod-empleados" id="new-empleado">
        <h2>Nuevo producto:</h2>
        <form method="post">
            <table>
                <tr>
                    <th>PROVEEDOR</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO COSTO</th>
                    <th>PRECIO VENTA</th>
                    <th>STOCK</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <td>
                        <select name="id_proveedor" id="proveedor">
                            <?php foreach ($this->prove as $e) { ?>
                                <option value="<?= $e['codigo_proveedor'] ?>"> <?= htmlentities($e['razon_social']) ?></option>
                            <?php  } ?>
                        </select>
                    </td>
                    <td><input type="text" name="desc" id="desc"></td>
                    <td><input type="number" name="precio_costo" id="precio_costo" value=""></td>
                    <td><input type="number" name="precio_venta" id="precio_venta" value=""></td>
                    <td><input type="number" name="stock" id="stock"></td>
                    <td>
                        <button type="submit" class="btn-modificar" name="nuevo" value="nuevo">CONFIRMAR</button>
                        <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="mod-empleados" id="modificacion-producto">
        <h2>Modificar producto</h2>
        <a href="#Divcontainer"><button name="Cancelar" value="Cancelar" class="btn-eliminar btn-cancelar-modificacion" id="btnCancelarModificar" onclick="btnCancelarModificacionProducto()">CANCELAR</button></a>
        <form id="formulario_modificacionProducto">
            <input type="text" name="id" id="id-producto" value="" class="inputId">
            <table>
                <tr>
                    <th>PROVEEDOR</th>
                    <th>DESCRIPCION</th>
                    <th>PRECIO COSTO</th>
                    <th>PRECIO VENTA</th>
                    <th>STOCK</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <td>
                        <select name="id_proveedor" id="proveedorSelect">
                            <?php foreach ($this->prove as $e) { ?>
                                <option value="<?= $e['codigo_proveedor'] ?>"> <?= htmlentities($e['razon_social']) ?> </option>
                            <?php  } ?>
                        </select>
                    </td>
                    <td><input type="text" name="descripcion" id="descripcion-producto" value=""></td>
                    <td><input type="number" name="precio_costo" id="precio_costo-producto" value=""></td>
                    <td><input type="number" name="precio_venta" id="precio_venta-producto" value=""></td>
                    <td><input type="number" name="stock" id="stock-producto" value=""></td>
                    <td class="tdAcciones">
                        <button type="submit" class="btn-modificar" name="Modificar" value="Modificar" id="guardarModificar" onclick="btnGuardarModificacionProducto()">GUARDAR</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>