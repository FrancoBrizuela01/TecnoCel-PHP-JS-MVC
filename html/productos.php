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

    <div class="Divcontainer" id="Divcontainer">
        <a href="#new-empleado"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">AGREGAR PRODUCTO</button></a>
        <h2>LISTA DE PRODUCTOS:</h2>
        <table>
            <tr>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO COSTO</th>
                <th>PRECIO VENTA</th>
                <th>STOCK</th>
                <th>ACCIONES</th>
            </tr>
            <?php foreach ($this->productos as $p) { ?>
                <tr>
                    <td><?= htmlentities($p['descripcion']) ?></td>
                    <td><?= htmlentities($p['precio_costo']) ?></td>
                    <td><?= htmlentities($p['precio_venta']) ?></td>
                    <td><?= htmlentities($p['stock']) ?></td>
                    <td>
                        <button class="btn-eliminar"><a href='../controllers/EliminarProducto.php?id=<?= htmlentities($p['codigo_producto']) ?> '>ELIMINAR </a></button>
                        <a href="#modificacion-producto"><button onclick="mostrarModificarProducto()" class="btn-modificar"> MODIFICAR </button></a>
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
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO COSTO</th>
                    <th>PRECIO VENTA</th>
                    <th>STOCK</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <td><input type="text" name="desc" id="desc"></td>
                    <td><input type="number" name="precio" id="precio" value=""></td>
                    <td>
                        <select name="nombre" id="nombre">
                            <?php foreach ($this->prove as $p) {  ?>
                                <option><?= htmlentities($p['razon_social']) ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><input type="number" name="precio_costo" id="precio_costo" value=""></td>
                    <td><input type="number" name="precio_venta" id="precio_venta" value=""></td>
                    <td><input type="number" name="stock" id="stock"></td>
                    <td>
                        <button type="submit" class="btn-modificar">CONFIRMAR</button>
                        <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="mod-empleados" id="modificacion-producto">
        <h2>Modificar producto</h2>
        <form method="post">
            <table>
                <tr>
                    <th>SELECCIONE UN PRODUCTO</th>
                    <th>NUEVO PRECIO COSTO</th>
                    <th>NUEVO PRECIO VENTA</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <td>
                        <select id="id" name="id">
                            <?php foreach ($this->productos as $p) { ?>
                                <option value="<?= htmlentities($p['codigo_producto']) ?>"><?= htmlentities($p['descripcion']) ?></option>
                            <?php  } ?>
                        </select>
                    </td>
                    <td><input type="number" name="precio_costo" id="precio_costo" value=""></td>
                    <td><input type="number" name="precio_venta" id="precio_venta" value=""></td>
                    <td id="">
                        <a><button type="submit" name="Modificar" value="Modificar" class="btn-modificar">MODIFICAR</button></a>
                        <a href="#Divcontainer"><button type="submit" name="cancelar" value="Cancelar" class="btn-eliminar" onclick="ocultarModificarEmpleados()">CANCELAR</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>