<?php namespace Vanilla\Database;

class Database
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

    public function all()
    {
        try {
            $smt = $this->db->prepare('SELECT * FROM messages');
            $smt->execute();
            return $smt->fetchAll();
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($name, $email, $message)
    {
        try {
            $smt = $this->db->prepare('INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)');
            $smt->bindParam(':name', $name);
            $smt->bindParam(':email', $email);
            $smt->bindParam(':message', $message);
            $smt->execute();
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
