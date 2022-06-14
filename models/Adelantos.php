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

    public function ModificarAdelanto($nombre, $apellido, $dni, $fecha, $cantidad, $id)
    {
        if (!isset($nombre)) throw new ValidacionException1('error 1');
        if (strlen($nombre) < 1) throw new ValidacionException1('error 2');
        if (strlen($nombre) > 20) throw new ValidacionException1('error 3');
        $nombre = $this->db->escape($nombre);

        if (!isset($apellido)) throw new ValidacionException1('error 4');
        if (strlen($apellido) < 1) throw new ValidacionException1('error 5');
        if (strlen($apellido) > 20) throw new ValidacionException1('error 6');
        $apellido = $this->db->escape($apellido);

        if (!is_numeric($dni)) throw new ValidacionException1('error 7');
        if (!ctype_digit($dni))  throw new ValidacionException1('error 8');

        $anio = substr($fecha, 0, 4); //yyyy-mm-dd
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);

        if (!ctype_digit($dia)) throw new ValidacionException('error 9');
        if ($dia < 1) throw new ValidacionException('error 10');
        if ($dia > 31) throw new ValidacionException('error 11');

        if (!ctype_digit($mes)) throw new ValidacionException('error 12');
        if ($mes < 1) throw new ValidacionException('error 13');
        if ($mes > 12) throw new ValidacionException('error 14');

        if (!ctype_digit($anio)) throw new ValidacionException('error 15');
        if ($anio < date('Y') - 1) throw new ValidacionException('error 16');
        if ($anio > date('Y')) throw new ValidacionException('error 17');

        if (!checkdate($mes, $dia, $anio)) throw new ValidacionException('error 18');

        if (!is_numeric($cantidad)) throw new ValidacionException1('error 19');
        if (!ctype_digit($cantidad))  throw new ValidacionException1('error 20');

        if (!is_numeric($id)) throw new ValidacionException1('error 21');
        if (!ctype_digit($id))  throw new ValidacionException1('error 22');

        $this->db->query("UPDATE adelantos
                            set nombre = '$nombre',
                                apellido = '$apellido',
                                dni     = $dni,
                                fecha = $fecha,
                                cantidad = $cantidad,
                                WHERE codigo_adelanto = $id ");
    }
}

class ValidacionException extends Exception
{
}
