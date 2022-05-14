<?php

// models/Adelantos.php

class Adelantos extends model
{
    public function crearAdelantoFechaDeterminada($empleadoid, $monto, $fecha)
    {

        $empleadoaux = new Empleado();
        if (!$empleadoaux->existeEmpleado($empleadoid)) throw new ValidacionException('error 1');
        if (!is_numeric($monto)) throw new ValidacionException('error 2');

        $anio = substr($fecha, 0, 4); //yyyy-mm-dd
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);

        if (!ctype_digit($dia)) throw new ValidacionException('error 3');
        if ($dia < 1) throw new ValidacionException('error 4');
        if ($dia > 31) throw new ValidacionException('error 5');

        if (!ctype_digit($mes)) throw new ValidacionException('error 6');
        if ($mes < 1) throw new ValidacionException('error 7');
        if ($mes > 12) throw new ValidacionException('error 8');

        if (!ctype_digit($anio)) throw new ValidacionException('error 9');
        if ($anio < date('Y') - 1) throw new ValidacionException('error 10');
        if ($anio > date('Y')) throw new ValidacionException('error 11');

        if (!checkdate($mes, $dia, $anio)) throw new ValidacionException('error 12');

        $fecha = "$anio-$mes-$dia";

        $this->db->query("INSERT INTO adelantos
						(codigo_empleado, cantidad, fecha) VALUES
						($empleadoid, $monto, '$fecha' ) ");
    }

    public function EliminarAdelanto($id)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("DELETE
							FROM adelantos
							WHERE codigo_empleado = $id ");
    }
}

class ValidacionException extends Exception
{
}
