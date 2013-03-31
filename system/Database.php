<?php

/**
 * Database - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		anccss
 * @author              Joey Hipolito <me@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Database {

    protected $conn = null;
    private $stmt;


    // create a connection
    public function __construct($dsn, $username, $passwd) {
        try {
            // mysql and pdo
            $this->conn = new PDO($dsn, $username, $passwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->get_error($e);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query($query) {
        $this->stmt =  $this->conn->prepare($query);
    }

    public function num_rows($query, $params = array()) {
        $this->stmt = $this->conn->prepare($query);
        $params = is_array($params) ? $params : array($params);
        $this->stmt->execute($params);
        return $this->stmt->rowCount();
    }

    public function fetchAssoc($query, $params = array()) {
        $this->stmt = $this->conn->prepare($query);
        $params = is_array($params) ? $params : array($params);
        $this->stmt->execute($params);
        return $this->stmt->fetch();
    }

    public function fetch($query, $params = array()) {
        $this->stmt = $this->conn->prepare($query);
        $params = is_array($params) ? $params : array($params);
        $this->stmt->execute($params);
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($query, $params = array()) {
        $this->stmt = $this->conn->prepare($query);
        $params = is_array($params) ? $params : array($params);
        $this->stmt->execute($params);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_error($e) {
        $this->conn = null;
        die($e->getMessage());
    }

    public function __destruct() {
        $this->conn = null;
    }
}

/* End of file Database.php */