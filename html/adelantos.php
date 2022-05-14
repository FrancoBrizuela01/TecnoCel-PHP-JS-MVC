<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require '../html/Partials/Head.php';
    ?>
</head>

<body>

    <div class="listaEmpleado">

        <?php
        require '../html/partials/navBar.php';
        ?>

        <div class="Divcontainer" id="Divcontainer">
            <a href="../controllers/AltaAdelantos.php"><button class="btn-newEmpleado" id="btn-newEmpleado" onclick="mostrarAgregarEmpleado()">ALTA DE ADELANTOS</button></a>
            <h2>LISTA DE ADELANTOS:</h2>
            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DNI</th>
                    <th>FECHA</th>
                    <th>CANTIDAD</th>
                </tr>
                <tr>
                    <?php foreach ($this->empleados as $a) { ?>
                        <td><?= htmlentities($a['nombre']) ?></td>
                        <td><?= htmlentities($a['apellido']) ?></td>
                        <td><?= htmlentities($a['dni']) ?></td>
                        <td><?= htmlentities($a['fecha']) ?></td>
                        <td><?= htmlentities($a['cantidad']) ?></td>
                </tr>
            <?php } ?>
            </table>
        </div>



    </div>

    <script src="../html/js/app.js"></script>
</body>

</html>