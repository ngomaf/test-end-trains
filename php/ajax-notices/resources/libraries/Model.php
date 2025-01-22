<?php

namespace resources\libraries;

use PDO;
use PDOException;

abstract class Model
{
    protected string $table;
    protected object $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DBHOST . ";port=" . DBPORT . ";dbname=" .DBNAME, DBUSER, DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }


    public function all() {
        try {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }


    public function find(int $id) {
        try {
            $sql = "SELECT * FROM  {$this->table} WHERE id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

}