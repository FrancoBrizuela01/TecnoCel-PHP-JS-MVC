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
        <h2>PEDIDOS A PROVEEDOR</h2>
        <form method="post">
            <table>
                <tr>
                    <th>PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>ACCIONES</th>
                </tr>
                <tr>
                    <td>
                        <select id="codigo" name="codigo">
                            <?php foreach ($this->insumos as $a) {  ?>
                                <option value="<?= htmlentities($a['codigo_producto']) ?>"><?= htmlentities($a['descripcion']) ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><input type="number" name="stock" id="stock"></td>
                    <td id=""><button type="submit" class="btn-modificar">CONFIRMAR</button></td>
                </tr>
            </table>
        </form>
    </div>

    <script src="../html/js/app.js"></script>
</body>

</html>