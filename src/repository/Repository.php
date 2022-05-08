<?php

require_once __DIR__ . '/../../PostgreSQL.php';

class Repository
{
    protected PostgreSQL $database;

    public function __construct()
    {
        $this->database = new PostgreSQL();
    }
}