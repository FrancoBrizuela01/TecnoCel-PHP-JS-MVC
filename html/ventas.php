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
                                <option value="<?= $p['codigo_producto'] ?>"><?= $p['descripcion'] ?></option>
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
            </tr>
            <?php foreach ($this->vendido as $v) { ?>
                <tr>
                    <td><?= htmlentities($v['fecha']) ?></td>
                    <td><?= htmlentities($v['descripcion']) ?></td>
                    <td><?= htmlentities($v['cantidad']) ?></td>
                    <td><?= htmlentities($v['total']) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>