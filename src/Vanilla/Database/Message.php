<?php namespace Vanilla\Database;

class Message extends Database {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns all messages.
     * @return [type] [description]
     */
    public function all()
    {
        try {
            $smt = $this->db->prepare('SELECT * FROM messages ORDER BY created_at DESC');
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