<?php

// models/Administrador.php

class Administrador extends model
{

    public function getAdm($email, $passwd)
    {


        // validacion del email

        if (!isset($email)) throw new ValidacionException('error 1');
        if (strlen($email) < 1) throw new ValidacionException('error 2');
        if (strlen($email) > 150);
        $email = $this->db->escape($email);

        // validacion de la password "string".

        if (!isset($passwd)) throw new ValidacionException('error 3');
        if (strlen($passwd) < 1) throw new ValidacionException('error 4');
        if (strlen($passwd) > 40);
        $passwd = $this->db->escape($passwd);

        $passwd = sha1($passwd);

        $this->db->query("SELECT *
								FROM administrador
								WHERE email = '$email' and password = '$passwd'
								LIMIT 1");

        return $this->db;
    }
}

class ValidacionException extends Exception
{
}
