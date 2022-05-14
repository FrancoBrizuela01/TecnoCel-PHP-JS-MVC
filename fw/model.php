<?php

// fw/model.php

abstract class model
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}
