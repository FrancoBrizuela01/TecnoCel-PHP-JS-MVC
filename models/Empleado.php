<?php

//models/Empleado.php

class Empleado extends model
{
    public function getTodos()
    {
        $this->db->query("SELECT * 
							From empleados");
        return $this->db->fetchAll();
    }

    public function getListaAdelantos()
    {
        $this->db->query("SELECT e.nombre, e.apellido, e.dni, a.fecha, a.cantidad
							FROM adelantos a
							LEFT JOIN empleados e ON a.codigo_empleado = e.codigo_empleado");
        return $this->db->fetchAll();
    }

    public function existeEmpleado($eid)
    {

        if (!ctype_digit($eid)) return false;
        if ($eid < 1) return false;

        $this->db->query("SELECT * FROM  empleados
							WHERE codigo_empleado = $eid");

        if ($this->db->numRows() != 1) return false;

        return true;
    }

    public function NuevoEmpleado($nombre, $apellido, $dni, $sueldo, $direccion, $altura, $telefono)
    {
        if (!is_numeric($dni)) throw new ValidacionException1('error 1');
        if ($dni < 1) throw new ValidacionException1('error 2');

        if (!isset($nombre)) throw new ValidacionException1('error 3');
        if (strlen($nombre) < 1) throw new ValidacionException1('error 4');
        if (strlen($nombre) > 20) throw new ValidacionException1('error 5');
        $nombre = $this->db->escape($nombre);

        if (!isset($apellido)) throw new ValidacionException1('error 6');
        if (strlen($apellido) < 1) throw new ValidacionException1('error 7');
        if (strlen($apellido) > 20) throw new ValidacionException1('error 8');
        $apellido = $this->db->escape($apellido);

        if (!is_numeric($sueldo)) throw new ValidacionException1('error 9');
        if ($sueldo < 1) throw new ValidacionException1('error 10');

        if (!isset($direccion)) throw new ValidacionException1('error 11');
        if (strlen($direccion) < 1) throw new ValidacionException1('error 12');
        if (strlen($direccion) > 20) throw new ValidacionException1('error 13');
        $direccion = $this->db->escape($direccion);

        if (!is_numeric($altura)) throw new ValidacionException1('error 14');
        if ($altura < 1) throw new ValidacionException1('error 15');

        if (!is_numeric($telefono)) throw new ValidacionException1('error 16');
        if ($telefono < 1) throw new ValidacionException1('error 17');


        $this->db->query("INSERT INTO empleados
        				(nombre, apellido, dni, sueldo, direccion, altura, telefono) VALUES
        				('$nombre', '$apellido', '$dni', '$sueldo', '$direccion', '$altura', '$telefono')");
    }

    public function EliminarEmpleado($id)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("DELETE
							FROM empleados
							WHERE codigo_empleado = $id ");
    }

    public function ModificarEmpleado($nombre, $apellido, $dni, $sueldo, $direccion, $altura, $telefono, $id)
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

        if (!is_numeric($sueldo)) throw new ValidacionException1('error 9');
        if (!ctype_digit($sueldo))  throw new ValidacionException1('error 10');

        if (!isset($direccion)) throw new ValidacionException1('error 11');
        if (strlen($direccion) < 1) throw new ValidacionException1('error 12');
        if (strlen($direccion) > 20) throw new ValidacionException1('error 13');
        $direccion = $this->db->escape($direccion);

        if (!is_numeric($altura)) throw new ValidacionException1('error 14');
        if (!ctype_digit($altura))  throw new ValidacionException1('error 15');

        if (!is_numeric($telefono)) throw new ValidacionException1('error 16');
        if (!ctype_digit($telefono))  throw new ValidacionException1('error 17');

        if (!is_numeric($id)) throw new ValidacionException1('error 18');
        if (!ctype_digit($id))  throw new ValidacionException1('error 19');

        $this->db->query("UPDATE empleados
							set nombre = '$nombre',
								apellido = '$apellido',
								dni 	= $dni,
                                sueldo = $sueldo,
                                direccion = '$direccion',
                                altura = $altura,
                                telefono = $telefono
							WHERE codigo_empleado = $id ");
    }
}

class ValidacionException1 extends Exception
{
}
