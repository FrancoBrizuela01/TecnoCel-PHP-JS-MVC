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
        <h2 class="h2Initial">ESTADISTICAS DEL AÑO:</h2>

        <form action="" method="post">
            <div class="divSelect">
                <select name="anio" id="inputAño" class="select">
                    <?php for ($anio = 2021; $anio < $anioActual + 10; $anio++) { ?>
                        <option value="<?= $anio ?>"><?= htmlentities($anio) ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="buscar" class="btn-search">
            </div>
        </form>

        <?php if (!$this->totalAño['precio']) : ?>
            <h2>AÑO SELECCIONADO: <?= htmlentities($this->AnioSelect) ?></h2>
            <table>
                <tr>
                    <th>TOTAL</th>
                    <th>MES MENOS VENDIDO</th>
                    <th>MES MÁS VENDIDO</th>
                    <th>VENTA RECORD</th>
                </tr>
                <tr>
                    <td>-</td>

                    <td>-</td>

                    <td>-</td>

                    <td>-</td>

                </tr>
            </table>
        <?php endif ?>

        <?php if ($this->totalAño['precio']) : ?>
            <h2>AÑO SELECCIONADO: <?= htmlentities($this->AnioSelect) ?></h2>
            <table>
                <tr>
                    <th>TOTAL</th>
                    <th>MES MENOS VENDIDO</th>
                    <th>MES MÁS VENDIDO</th>
                    <th>VENTA RECORD</th>
                </tr>
                <tr>
                    <td>$<?= htmlentities($this->totalAño['precio']) ?></td>

                    <td><?= htmlentities($this->mesMin['nombre']) ?> $<?= htmlentities($this->mesMin['total']) ?></td>

                    <td><?= htmlentities($this->mesMax['nombre']) ?> $<?= htmlentities($this->mesMax['total']) ?></td>

                    <td><?= htmlentities($this->NombreDia($this->record['fecha'])) ?> <?= htmlentities($this->record['fechaRecord']) ?> <?= htmlentities($this->record['mes']) ?> $<?= htmlentities($this->record['precio']) ?></td>

                </tr>
            </table>
        <?php endif ?>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../html/js/app.js"></script>
</body>

</html>