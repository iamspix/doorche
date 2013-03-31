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
    }

    public function register() {

        $registered = session_set_save_handler(
            array($this, '_open'),
            array($this, '_close'),
            array($this, '_read'),
            array($this, '_write'),
            array($this, '_destroy'),
            array($this, '_gc')
        );
        if (!$registered) {
            throw new Exception('Can not register session savehandler.');
        }
    }

    public function _open() {
        return $this->db ? true : false;
    }

    public function _close() {
        return $this->db->close() ? true : false;
    }

    public function _read($session_id) {
        $query = 'SELECT session_data from tbl_sessions where session_id = :session_id';
        if ($this->db->fetch($query, array(':session_id' => $session_id))) {
            $row = $this->db->fetch($query, array(':session_id' => $session_id));
            return $row['session_data'];
        } else {
            return null;
        }
    }

    public function _write($session_id, $session_data) {
        $access = time();

        //
        $query = 'REPLACE INTO tbl_sessions VALUES (:session_id, :access, :session_data)';
        $bindVal = array(
            ':session_id' => $session_id,
            ':access' => $access,
            ':session_data' => $session_data
        );
        $stmt = $this->db->query($query);
        if ($stmt->execute($bindVal)) {
            return true;
        }

        return false;
    }

    public function _destroy($session_id) {
        $query = 'DELETE FROM tbl_sessions where session_id = :session_id';
        $stmt = $this->db->query($query);
        if ($stmt->execute(array(':session_id' => $session_id))) {
            return true;
        }

        return false;
    }

    public function _gc($max) {
        // calculate what is deemed old
        $old = time() - $max;

        $query = 'DELETE FROM tbl_sessions WHERE access < :old';
        $stmt = $this->db->query($query);
        if ($stmt->execute(array(':old' => $old))) {
            return true;
        }

        return false;
    }
}

/* End of file Session.php */