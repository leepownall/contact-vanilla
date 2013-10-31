<?php namespace Vanilla\Database;

abstract class Database
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=contact-vanilla;', 'root', '');
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
