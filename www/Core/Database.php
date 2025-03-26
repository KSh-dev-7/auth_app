<?php

namespace Core;

class Database
{
    private static $instance;
    private $db;
    private $statement;

    private function __construct()
    {
        $config = require_once base_path("config/db.php");
        try{
            $this->db = new \PDO("mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}", $config['user'], $config['password'], $config['options']);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function query($query, $params)
    {
        $this->statement = $this->db->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $res = $this->find();
        if(!$res) {
            Router::abort();
        }
        return $res;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function __destruct()
    {
        $this->db = null;
    }
}