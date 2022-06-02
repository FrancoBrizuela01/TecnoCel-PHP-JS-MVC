<?php

// ../models/Proveedor.php

class Proveedor extends model
{


    public function GetProve()
    {

        $this->db->query("SELECT * 
							FROM proveedor");

        return $this->db->fetchAll();
    }

    public function NuevoProveedor($nombre_empresa, $razon_social, $cuit, $direccion, $altura, $telefono)
    {

        if (!isset($nombre_empresa)) throw new ValidacionException3('error 1');
        if (strlen($nombre_empresa) < 1) throw new ValidacionException3('error 2');
        if (strlen($nombre_empresa) > 20) throw new ValidacionException3('error 3');
        $nombre_empresa = $this->db->escape($nombre_empresa);

        if (!isset($razon_social)) throw new ValidacionException3('error 4');
        if (strlen($razon_social) < 1) throw new ValidacionException3('error 5');
        if (strlen($razon_social) > 20) throw new ValidacionException3('error 6');
        $razon_social = $this->db->escape($razon_social);

        if (!is_numeric($cuit)) throw new ValidacionException1('error 7');
        if (!ctype_digit($cuit))  throw new ValidacionException1('error 8');

        if (!isset($direccion)) throw new ValidacionException3('error 9');
        if (strlen($direccion) < 1) throw new ValidacionException3('error 10');
        if (strlen($direccion) > 20) throw new ValidacionException3('error 11');
        $direccion = $this->db->escape($direccion);

        if (!is_numeric($altura)) throw new ValidacionException1('error 12');
        if (!ctype_digit($altura))  throw new ValidacionException1('error 13');

        if (!is_numeric($telefono)) throw new ValidacionException1('error 14');
        if (!ctype_digit($telefono))  throw new ValidacionException1('error 15');

        $this->db->query("INSERT INTO proveedor
							(nombre_empresa, razon_social, cuit, direccion, altura, telefono) VALUES
							('$nombre_empresa', '$razon_social', $cuit, '$direccion', $altura, $telefono) ");
    }

    public function ModificarProveedor($nombre_empresa, $razon_social, $cuit, $direccion, $altura, $telefono, $id)
    {

        if (!isset($nombre_empresa)) throw new ValidacionException3('error 1');
        if (strlen($nombre_empresa) < 1) throw new ValidacionException3('error 2');
        if (strlen($nombre_empresa) > 20) throw new ValidacionException3('error 3');
        $nombre_empresa = $this->db->escape($nombre_empresa);

        if (!isset($razon_social)) throw new ValidacionException3('error 4');
        if (strlen($razon_social) < 1) throw new ValidacionException3('error 5');
        if (strlen($razon_social) > 20) throw new ValidacionException3('error 6');
        $razon_social = $this->db->escape($razon_social);

        if (!is_numeric($cuit)) throw new ValidacionException1('error 7');
        if (!ctype_digit($cuit))  throw new ValidacionException1('error 8');

        if (!isset($direccion)) throw new ValidacionException3('error 9');
        if (strlen($direccion) < 1) throw new ValidacionException3('error 10');
        if (strlen($direccion) > 20) throw new ValidacionException3('error 11');
        $direccion = $this->db->escape($direccion);

        if (!is_numeric($altura)) throw new ValidacionException1('error 12');
        if (!ctype_digit($altura))  throw new ValidacionException1('error 13');

        if (!is_numeric($telefono)) throw new ValidacionException1('error 14');
        if (!ctype_digit($telefono))  throw new ValidacionException1('error 15');

        if (!is_numeric($id)) throw new ValidacionException1('error 16');
        if (!ctype_digit($id))  throw new ValidacionException1('error 17');

        $this->db->query("UPDATE proveedor
								set nombre_empresa = '$nombre_empresa',
									razon_social = '$razon_social',
                                    cuit = $cuit,
                                    direccion = '$direccion',
                                    altura = $altura,
                                    telefono = $telefono
								WHERE codigo_proveedor = $id ");
    }

    public function EliminarProveedor($id)
    {

        if (!is_numeric($id)) throw new ValidacionException3('error 1');
        if (!ctype_digit($id))  throw new ValidacionException3('error 2');

        $this->db->query("DELETE 
							FROM proveedor
							WHERE codigo_proveedor = '$id' ");
    }
}

class ValidacionException3 extends Exception
{
}
