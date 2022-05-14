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

    <?php
    $anioActual = date('Y');
    ?>

    <div class="Divcontainer" id="Divcontainer">
        <h2 class="h2Initial">ESTADISTICAS DEL MES</h2>

        <form action="" method="post">
            <div class="divSelect">
                <select name="mes" class="select">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <select name="anio" class="select">
                    <?php for ($i = 2021; $i < $anioActual + 10; $i++) { ?>
                        <option value="<?= $i ?>"><?= htmlentities($i) ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Buscar" class="btn-search">
            </div>

        </form>

        <?php if (!$this->totalMes['precio']) : ?>
            <h2><?= htmlentities($this->nombreMes['nombre']) ?></h2>
            <table>
                <tr>
                    <th>TOTAL</th>
                    <th>PROMEDIO</th>
                    <th>VENTA MINIMA</th>
                    <th>VENTA MAXIMA</th>
                </tr>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>

                </tr>
            </table>
        <?php endif ?>

        <?php if ($this->totalMes['precio']) : ?>
            <h2><?= htmlentities($this->nombreMes['nombre']) ?></h2>
            <table>
                <tr>
                    <th>TOTAL</th>
                    <th>VENTA MINIMA</th>
                    <th>VENTA MAXIMA</th>
                </tr>
                <tr>
                    <td>$<?= htmlentities($this->totalMes['precio']) ?></td>

                    <td><?= htmlentities($this->NombreDia($this->diaMin['fecha'])) ?>
                        $<?= htmlentities($this->diaMin['precio']) ?></td>

                    <td><?= htmlentities($this->NombreDia($this->diaMax['fecha'])) ?>
                        $<?= htmlentities($this->diaMax['precio']) ?></td>

                </tr>
            </table>
        <?php endif ?>
    </div>

    <script src="../html/js/app.js"></script>
</body>

</html>