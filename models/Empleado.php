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

    public function NuevoEmpleado($nombre, $apellido, $dni)
    {


        if (!is_numeric($dni)) throw new ValidacionException1('error 1');

        if ($dni < 1) throw new ValidacionException1('error 2');
        //if($dni > 9) die("error 3");

        if (!isset($nombre)) throw new ValidacionException1('error 3');
        if (strlen($nombre) < 1) throw new ValidacionException1('error 4');
        if (strlen($nombre) > 20) throw new ValidacionException1('error 5');
        $nombre = $this->db->escape($nombre);

        if (!isset($apellido)) throw new ValidacionException1('error 6');
        if (strlen($apellido) < 1) throw new ValidacionException1('error 7');
        if (strlen($apellido) > 20) throw new ValidacionException1('error 8');
        $apellido = $this->db->escape($apellido);


        $this->db->query("INSERT INTO empleados
        				(nombre, apellido, dni) VALUES
        				('$nombre', '$apellido', $dni)");
    }

    public function EliminarEmpleado($id)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("DELETE
							FROM empleados
							WHERE codigo_empleado = $id ");
    }

    public function ModificarEmpleado($nombre, $apellido, $dni, $id)
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

        if (!is_numeric($id)) throw new ValidacionException1('error 9');
        if (!ctype_digit($id))  throw new ValidacionException1('error 10');

        $this->db->query("UPDATE empleados
							set nombre = '$nombre',
								apellido = '$apellido',
								dni 	= $dni
							WHERE codigo_empleado = $id");
    }
}

class ValidacionException1 extends Exception
{
}
