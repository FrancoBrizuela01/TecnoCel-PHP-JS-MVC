<?php

// models/Produ.php

class Producto extends model
{

    public function getTodosProdu()
    {

        $this->db->query("SELECT * 
							FROM productos");

        return $this->db->fetchAll();
    }

    public function NuevoProducto($desc, $precio, $nombre, $stock)
    {

        if (!isset($desc)) throw new ValidacionException('error 1');
        if (strlen($desc) < 1) throw new ValidacionException('error 2');
        if (strlen($desc) > 20) throw new ValidacionException('error 3');
        $desc = $this->db->escape($desc);

        if (!isset($nombre)) throw new ValidacionException('error 4');
        if (strlen($nombre) < 1) throw new ValidacionException('error 5');
        if (strlen($nombre) > 20) throw new ValidacionException('error 6');
        $nombre = $this->db->escape($nombre);

        if (strlen($precio) < 1) throw new ValidacionException('error 7');
        if (strlen($precio) > 40) throw new ValidacionException('error 8');
        $precio = $this->db->escape($precio);

        if (!is_numeric($stock)) throw new ValidacionException1('error 9');
        if (!ctype_digit($stock))  throw new ValidacionException1('error 10');

        $this->db->query("INSERT INTO productos
								(descripcion, precio_costo, nombre_prove, stock) VALUES
								('$desc', $precio, '$nombre', $stock )");
    }

    public function EliminarProducto($id)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("DELETE
								FROM productos
								WHERE codigo_producto = $id ");
    }

    public function ModificarProducto($desc, $precio, $prove, $stock, $id)
    {


        if (strlen($precio) < 1) throw new ValidacionException2('error 1');
        if (strlen($precio) > 40) throw new ValidacionException2('error 2');
        $precio = $this->db->escape($precio);

        if (!isset($prove)) throw new ValidacionException2('error 3');
        if (strlen($prove) < 1) throw new ValidacionException2('error 4');
        if (strlen($prove) > 20) throw new ValidacionException2('error 5');
        $prove = $this->db->escape($prove);

        if (strlen($stock) < 1) throw new ValidacionException2('error 6');
        if (strlen($stock) > 40) throw new ValidacionException2('error 7');
        $stock = $this->db->escape($stock);

        if (!isset($desc)) throw new ValidacionException2('error 8');
        if (strlen($desc) < 1) throw new ValidacionException2('error 9');
        if (strlen($desc) > 20) throw new ValidacionException2('error 10');
        $desc = $this->db->escape($desc);

        if (!is_numeric($id)) throw new ValidacionException1('error 11');
        if (!ctype_digit($id))  throw new ValidacionException1('error 12');

        $this->db->query("UPDATE productos
								set descripcion = '$desc',
									precio_costo = $precio,
									nombre_prove = '$prove',
									stock = $stock
								WHERE codigo_producto = $id");
    }

    public function VentaRealizada($id, $cantidad)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        if (!is_numeric($cantidad)) throw new ValidacionException1('error 3');
        if (!ctype_digit($cantidad))  throw new ValidacionException1('error 4');

        $this->db->query("UPDATE productos
								set stock = stock - $cantidad
								WHERE codigo_producto = $id	");
    }

    public function ComprarInsumos($id, $stock)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        if (!is_numeric($stock)) throw new ValidacionException1('error 3');
        if (!ctype_digit($stock))  throw new ValidacionException1('error 4');

        $this->db->query("UPDATE productos
								set stock = stock + $stock
								WHERE codigo_producto = $id	");
    }
}

class ValidacionException extends Exception
{
}
