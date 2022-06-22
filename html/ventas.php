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
            <h2 class="h2Initial">REGISTRAR VENTAS:</h2>
            <form action="" method="post" id="product-form">
                <table>
                    <tr>
                        <th>FECHA</th>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                    <tr>
                        <td><input type="date" name="fecha" id="fecha" value=""></td>
                        <td>
                            <select id="codigo" name="codigo">
                                <?php foreach ($this->productos as $p) {  ?>
                                    <option value="<?= $p['codigo_producto'] ?>"><?= $p['descripcion'] ?> (<?= $p['razon_social'] ?>)</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="number" name="cantidad" id="cantidad"></td>
                        <td><button type="submit" value="AGREGAR" class="btn-modificar" id="btn-limpiar" onclick="agregarVenta()">AGREGAR</button></td>
                    </tr>
                    </tr>
                </table>
            </form>
        </div>

        <div id="product-list" class="Divcontainer">
            <h2 class="h2Initial">HISTORIAL DE VENTAS:</h2>
            <table>
                <tr>
                    <th>FECHA</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                    <th>ACCIONES</th>
                </tr>
                <?php foreach ($this->vendido as $v) { ?>
                    <tr>
                        <td><?= htmlentities($v['fecha']) ?></td>
                        <td><?= htmlentities($v['descripcion']) ?></td>
                        <td><?= htmlentities($v['cantidad']) ?></td>
                        <td><?= htmlentities($v['total']) ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn-eliminar" onclick="btnEliminarVenta(<?= $v['codigo_venta'] ?>)">ELIMINAR</button>
                                <button class="btn-modificar" onclick="btnModificarVenta('<?= $v['fecha'] ?>', <?= $v['cantidad'] ?>, <?= $v['codigo_venta'] ?>, <?= $v['codigo_producto'] ?>)">MODIFICAR</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>


        <div class="mod-empleados" id="modificacion-producto">
            <h2>Modificar venta</h2>
            <a href="#Divcontainer"><button name="Cancelar" value="Cancelar" class="btn-eliminar btn-cancelar-modificacion" id="btnCancelarModificar" onclick="btnCancelarModificacionVenta()">CANCELAR</button></a>
            <form id="formulario_modificacionVenta">
                <input type="text" name="id" id="id-venta" value="" class="inputId">
                <table>
                    <tr>
                        <th>FECHA</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>ACCIONES</th>
                    </tr>
                    <tr>
                        <td><input type="date" name="fecha" id="mod_fecha_venta" value=""></td>
                        <td>
                            <select id="codigo_producto" name="codigo_producto">
                                <?php foreach ($this->productos as $p) {  ?>
                                    <option value="<?= $p['codigo_producto'] ?>"><?= $p['descripcion'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="number" name="cantidad" id="mod_cantidad_venta" value=""></td>
                        <td class="tdAcciones">
                            <button type="submit" class="btn-modificar" name="Modificar" value="Modificar" id="guardarModificar" onclick="btnGuardarModificacionVenta()">GUARDAR</button>
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