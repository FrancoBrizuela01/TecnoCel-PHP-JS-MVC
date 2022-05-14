<?php

// models/ValidacionMes.php

class meses extends model
{

    public function nombreMes($numMes)
    {

        /*  VALIDACION DEL MES  */
        if ($numMes <= 0) die('ERROR1');
        if ($numMes > 12) die('ERROR2');
        if (strlen($numMes) < 1 || strlen($numMes) > 2) die('ERROR3');
        if (!is_numeric($numMes)) die('ERROR4');

        $this->db->query("SELECT *
							FROM   meses
							WHERE  numero = '$numMes'");

        return $this->db->fetch();
    }
}
