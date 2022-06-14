<?php

// models/venta.php


class Venta extends model
{


    public function GetVentas()
    {

        $this->db->query("SELECT v.fecha, p.descripcion, v.cantidad, v.cantidad * p.precio_venta as total
                            FROM codigo_venta v 
                            LEFT JOIN productos p ON v.codigo_producto = p.codigo_producto
                            ORDER by v.codigo_venta desc
                            LIMIT 10
                            ");

        return $this->db->fetchAll();
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

        $this->db->query("SELECT   MONTH (v.fecha) AS mes , m.nombre , SUM(v.cantidad * p.precio_venta) AS total
							FROM     codigo_venta v , meses m
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

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2021)  throw new ValidacionException5('error 1');
        if (strlen($anio) != 4)  throw new ValidacionException5('error 2');
        if (!is_numeric($anio))  throw new ValidacionException5('error 3');

        $this->db->query("SELECT   MONTH (v.fecha) AS mes , m.nombre , SUM(v.cantidad * p.precio_venta) AS total
							FROM     codigo_venta v , meses m
                            LEFT JOIN productos p ON p.codigo_producto = v.codigo_producto
							WHERE    MONTH (v.fecha) = m.numero
							AND      YEAR  (v.fecha) = '$anio'
							GROUP BY mes
							ORDER BY total DESC
							LIMIT    1");

        return $this->db->fetch();
    }


    public function VentaRecord($anio)
    {

        $this->db->query("SELECT v.fecha , SUM(v.cantidad * p.precio_venta) precio , DATE_FORMAT(v.fecha,'%d') fechaRecord , m.nombre mes
							FROM   codigo_venta v , meses m
                            LEFT JOIN productos p ON p.codigo_producto = v.codigo_producto
							WHERE  YEAR(v.fecha) = '$anio'
							AND    MONTH (v.fecha) = m.numero
							GROUP BY DAY(v.fecha) , MONTH(v.fecha)
							ORDER BY v.cantidad DESC
							LIMIT 1");

        return $this->db->fetch();
    }

    public function ListaVentasDelMes($mes, $anio)
    {

        /*  VALIDACION DEL MES  */
        if ($mes <= 0) die('ERROR1');
        if ($mes > 12) die('ERROR2');
        if (strlen($mes) < 1 || strlen($mes) > 2) die('ERROR3');
        if (!is_numeric($mes)) die('ERROR4');

        /*  VALIDACION DEL AÑO  */
        if ($anio < 2021) die('ERROR-1');
        if (strlen($anio) != 4) die('ERROR-2');
        if (!is_numeric($anio)) die('ERROR-3');

        $this->db->query("SELECT   DAY(c.fecha) dia , SUM(c.cantidad * p.precio_venta) precio 
                            FROM     codigo_venta c
                            LEFT JOIN productos p ON p.codigo_producto = c.codigo_producto
                            WHERE    YEAR (fecha) = '$anio'
                            AND      MONTH(fecha) = '$mes'
                            GROUP BY dia
                            ORDER BY fecha ASC");

        return $this->db->fetchAll();
    }
}

class ValidacionException5 extends Exception
{
}
