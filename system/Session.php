<?php

/**
 * Session - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Session {
    /**
     *
     * @var db - Database 
     */
    private $db;
    
    public function __construct($dbconn) {
        $this->db = $dbconn;
        
        session_set_save_handler(
                array($this, '_open'),
                array($this, '_close'),
                array($this, '_read'),
                array($this, '_write'),
                array($this, '_destroy'),
                array($this, '_gc'));
        
        // start the session
        
        session_start();
    }
    
    public function _open() {
        return $this->db ? true : false;
    }
    
    public function _close() {
        return $this->db->close() ? true : false;
    }
    
    public function _read($id) {
        $query = 'SELECT data from sessions where id = :id';
        if ($this->db->fetch($query, array(':id' => $id))) {
            $row = $this->db->fetch($query, array(':id' => $id));
            return $row['data'];
        } else {
            return null;
        }
    }
    
    public function _write($id, $data) {
        $access = time();
        
        //
        $query = 'REPLACE INTO sessions VALUES (:id, :access, :data)';
        $bindVal = array(
            ':id' => $id,
            ':access' => $access,
            ':data' => $data
        );
        $stmt = $this->db->query($query);
        if ($stmt->execute($bindVal)) {
            return true;
        }
        
        return false;
    }
    
    public function _destroy($id) {
        $query = 'DELETE FROM sessions where id = :id';
        $stmt = $this->db->query($query);
        if ($stmt->execute(array(':id' => $id))) {
            return true;
        }
        
        return false;
    }
    
    public function _gc($max) {
        // calculate what is deemed old
        $old = time() - $max;
        
        $query = 'DELETE FROM sessions WHERE access < :old';
        $stmt = $this->db->query($query);
        if ($stmt->execute(array(':old' => $old))) {
            return true;
        }
        
        return false;
    }
}

/* End of file Session.php */