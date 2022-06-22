<?php

// models/venta.php


class Venta extends model
{


    public function GetVentas()
    {

        $this->db->query("SELECT v.fecha, p.descripcion, v.cantidad, v.cantidad * p.precio_venta as total, v.codigo_venta, v.codigo_producto
                            FROM codigo_venta v 
                            LEFT JOIN productos p ON v.codigo_producto = p.codigo_producto
                            ORDER by v.codigo_venta desc
                            ");

        return $this->db->fetchAll();
    }

    public function ModificarVenta($fecha, $cantidad, $codigo_producto, $id)
    {
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

        $fecha = "$anio-$mes-$dia";

        if (!is_numeric($cantidad)) throw new ValidacionException('error 19');
        if (!ctype_digit($cantidad))  throw new ValidacionException('error 20');

        if (!is_numeric($id)) throw new ValidacionException('error 18');
        if (!ctype_digit($id))  throw new ValidacionException('error 19');

        $this->db->query("UPDATE codigo_venta
							set fecha = '$fecha',
								cantidad = $cantidad,
                                codigo_producto = $codigo_producto
							WHERE codigo_venta = $id ");
    }

    public function EliminarVenta($id)
    {
        if (!is_numeric($id)) throw new ValidacionException('error 1');
        if (!ctype_digit($id))  throw new ValidacionException('error 2');

        $this->db->query("DELETE
							FROM codigo_venta
							WHERE codigo_venta = $id ");
    }

    public function AgregarVenta($fecha, $cantidad, $codigo)
    {

        if (strlen($cantidad) < 1) throw new ValidacionException5('error 1');
        if (strlen($cantidad) > 40) throw new ValidacionException5('error 2');
        $cantidad = $this->db->escape($cantidad);

        $anio = substr($fecha, 0, 4); //yyyy-mm-dd
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);

        if (!ctype_digit($dia)) throw new ValidacionException5('error 3');
        if ($dia < 1) throw new ValidacionException5('error 4');
        if ($dia > 31) throw new ValidacionException5('error 5');

        if (!ctype_digit($mes)) throw new ValidacionException5('error 6');
        if ($mes < 1) throw new ValidacionException5('error 7');
        if ($mes > 12) throw new ValidacionException5('error 8');

        if (!ctype_digit($anio)) throw new ValidacionException5('error 9');
        if ($anio < date('Y') - 1) throw new ValidacionException5('error 10');
        if ($anio > date('Y')) throw new ValidacionException5('error 11');

        if (!checkdate($mes, $dia, $anio)) throw new ValidacionException5('error 12');

        $fecha = "$anio-$mes-$dia";

        $this->db->query("INSERT INTO codigo_venta
								(codigo_producto, fecha, cantidad) VALUES
								($codigo, '$fecha', $cantidad)	");
    }

    public function totalMes($mes, $anio)
    {

        /*  VALIDACION DEL MES  */
        if ($mes <= 0)  throw new ValidacionException5('error 1');
        if ($mes > 12)  throw new ValidacionException5('error 2');
        if (strlen($mes) < 1 || strlen($mes) > 2)  throw new ValidacionException5('error 3');
        if (!is_numeric($mes))  throw new ValidacionException5('error 4');
        /*  VALIDACION DEL AÑO  */
        if ($anio < 2019)  throw new ValidacionException5('error 5');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 6');
        if (!is_numeric($anio))  throw new ValidacionException5('error 7');

        $this->db->query("SELECT SUM(c.cantidad * p.precio_venta) AS precio
                            FROM   codigo_venta c 
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            WHERE  MONTH (fecha) = '$mes' 
                            AND    YEAR  (fecha) = '$anio'");

        return $this->db->fetch();
    }


    public function diaMax($mes, $anio)
    {

        /*  VALIDACION DEL MES  */
        if ($mes <= 0)  throw new ValidacionException5('error 1');
        if ($mes > 12)  throw new ValidacionException5('error 2');
        if (strlen($mes) < 1 || strlen($mes) > 2)  throw new ValidacionException5('error 3');
        if (!is_numeric($mes))  throw new ValidacionException5('error 4');

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2019)  throw new ValidacionException5('error 5');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 6');
        if (!is_numeric($anio))  throw new ValidacionException5('error 7');;

        $this->db->query("SELECT   c.codigo_venta , c.cantidad * p.precio_venta AS precio , c.fecha 
                            FROM     codigo_venta c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            WHERE    MONTH (fecha) = '$mes'
                            AND      YEAR  (fecha) = '$anio'
                            GROUP BY DAY   (fecha)
                            ORDER BY precio DESC
                            LIMIT 1");

        return $this->db->fetch();
    }


    public function diaMin($mes, $anio)
    {

        /*  VALIDACION DEL MES  */
        if ($mes <= 0)  throw new ValidacionException5('error 1');
        if ($mes > 12)  throw new ValidacionException5('error 2');
        if (strlen($mes) < 1 || strlen($mes) > 2)  throw new ValidacionException5('error 3');
        if (!is_numeric($mes))  throw new ValidacionException5('error 4');

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2019)  throw new ValidacionException5('error 5');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 6');
        if (!is_numeric($anio))  throw new ValidacionException5('error 7');

        $this->db->query("SELECT   c.codigo_venta , c.cantidad * p.precio_venta AS precio , c.fecha 
                            FROM     codigo_venta c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            WHERE    MONTH (fecha) = '$mes'
                            AND      YEAR  (fecha) = '$anio'
                            GROUP BY DAY   (fecha)
                            ORDER BY precio ASC
                            LIMIT 1");

        return $this->db->fetch();
    }


    public function promedioDia($mes, $anio)
    {

        /*  VALIDACION DEL MES  */
        if ($mes <= 0)  throw new ValidacionException5('error 1');
        if ($mes > 12)  throw new ValidacionException5('error 2');
        if (strlen($mes) < 1 || strlen($mes) > 2)  throw new ValidacionException5('error 3');
        if (!is_numeric($mes))  throw new ValidacionException5('error 4');

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2019)  throw new ValidacionException5('error 5');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 6');
        if (!is_numeric($anio))  throw new ValidacionException5('error 7');

        $this->db->query("SELECT ROUND ( AVG(c.cantidad * p.precio_venta) ) AS promedio
							FROM   codigo_venta c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
							WHERE  MONTH (fecha) = '$mes' 
							AND    YEAR  (fecha) = '$anio'");

        return $this->db->fetch();
    }



    /*                                               *
	*                                                *
	*                                                *
	*		FUNCIONES PARA ESTADISTICA DEL AÑO       *
	*                                                *
	*                                                *
	*                                                */


    public function añoSeleccionado($anio)
    {
        if ($anio < 2021)  throw new ValidacionException5('error 1');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 2');
        if (!is_numeric($anio))  throw new ValidacionException5('error 3');

        return $anio;
    }


    public function totalAño($anio)
    {

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2021)  throw new ValidacionException5('error 1');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 2');
        if (!is_numeric($anio))  throw new ValidacionException5('error 3');

        $this->db->query("SELECT SUM(c.cantidad * p.precio_venta) AS precio
                            FROM  codigo_venta c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            WHERE YEAR(fecha) = '$anio'");

        return $this->db->fetch();
    }


    public function mesMin($anio)
    {

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2021)  throw new ValidacionException5('error 1');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 2');
        if (!is_numeric($anio))  throw new ValidacionException5('error 3');

        $this->db->query("SELECT  MONTH (v.fecha) AS mes , m.nombre , SUM(v.cantidad * p.precio_venta) AS total
							FROM     meses m, codigo_venta v  
                            LEFT JOIN productos p ON p.codigo_producto = v.codigo_producto
                            WHERE    MONTH (v.fecha) = m.numero
                            AND      YEAR  (v.fecha) = '$anio'
                            GROUP BY mes
                            ORDER BY total ASC
                            LIMIT    1");

        return $this->db->fetch();
    }


    public function mesMax($anio)
    {

        /*  VALIDACION DEL AÑO */
        if ($anio < 2021)  throw new ValidacionException5('error 1');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 2');
        if (!is_numeric($anio))  throw new ValidacionException5('error 3');

        $this->db->query("SELECT   MONTH (v.fecha) AS mes , m.nombre , SUM(v.cantidad * p.precio_venta) AS total
                            FROM     meses m, codigo_venta v 
                            LEFT JOIN productos p ON p.codigo_producto = v.codigo_producto
                            WHERE    MONTH (v.fecha) = m.numero
                            AND      YEAR  (v.fecha) = '$anio'
                            GROUP BY mes
                            ORDER BY total DESC
                            LIMIT    1");

        return $this->db->fetch();
    }
}

class ValidacionException5 extends Exception
{
}
