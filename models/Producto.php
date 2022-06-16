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


    public function NuevoProducto($desc, $precio_costo, $precio_venta, $stock)
    {

        if (!isset($desc)) throw new ValidacionException('error 1');
        if (strlen($desc) < 1) throw new ValidacionException('error 2');
        if (strlen($desc) > 30) throw new ValidacionException('error 3');
        $desc = $this->db->escape($desc);

        if (!is_numeric($precio_costo)) throw new ValidacionException1('error 4');
        if (!ctype_digit($precio_costo))  throw new ValidacionException1('error 5');

        if (!is_numeric($precio_venta)) throw new ValidacionException1('error 6');
        if (!ctype_digit($precio_venta))  throw new ValidacionException1('error 7');

        if (!is_numeric($stock)) throw new ValidacionException1('error 8');
        if (!ctype_digit($stock))  throw new ValidacionException1('error 9');

        $this->db->query("INSERT INTO productos
								(descripcion, precio_costo, precio_venta, stock) VALUES
								('$desc', $precio_costo, '$precio_venta', $stock )");
    }

    public function EliminarProducto($id)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("DELETE
								FROM productos
								WHERE codigo_producto = $id ");
    }

    public function ModificarProducto($descripcion, $precio_costo, $precio_venta, $stock, $id)
    {
        if (!is_numeric($precio_costo)) throw new ValidacionException1('error 1');
        if (!ctype_digit($precio_costo))  throw new ValidacionException1('error 2');

        if (!is_numeric($precio_venta)) throw new ValidacionException1('error 3');
        if (!ctype_digit($precio_venta))  throw new ValidacionException1('error 4');

        if (!is_numeric($id)) throw new ValidacionException1('error 11');
        if (!ctype_digit($id))  throw new ValidacionException1('error 12');


        $this->db->query("UPDATE productos
								set	descripcion = '$descripcion',
                                      precio_costo = $precio_costo,
									  precio_venta = $precio_venta,
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

        $this->db->query("INSERT INTO compra_producto
                            (codigo_producto, cantidad) VALUES 
                            ($id, $stock)");
    }

    public function CantidadStock($id, $cantidad)
    {

        if (!is_numeric($id)) throw new ValidacionException1('error 1');
        if (!ctype_digit($id))  throw new ValidacionException1('error 2');

        $this->db->query("SELECT stock
                            FROM productos
                            WHERE codigo_producto = $id and 
                                    stock > $cantidad");

        if ($this->db->numRows() != 1) return false;
        return true;
    }

    public function getCompras()
    {
        $this->db->query("SELECT p.descripcion, c.cantidad, c.cantidad * p.precio_costo as total
                            FROM compra_producto c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            ORDER BY codigo_compra desc
                            LIMIT 10 ");
        return $this->db->fetchAll();
    }

    public function CambiarPrecioVenta ( $porciento ) 
    {

        $this->db->query ( "UPDATE productos
                            SET    precio_venta = precio_venta + ( precio_venta * '$porciento' / 100 )");
    }
    public function CambiarPrecioCosto ( $porciento ) 
    {

        $this->db->query ( "UPDATE productos
                            SET    precio_costo = precio_costo + ( precio_costo * '$porciento' / 100 )");
    }
}

class ValidacionException extends Exception
{
}
