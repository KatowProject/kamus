<?php 
defined("BASEPATH") or exit("No direct script access allowed");

include_once '../const.php';

class Database {    
    public $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno):
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
            exit();
        endif;
    }

    function get($word, $type) {
        $query = "SELECT * FROM word WHERE name = ? AND type_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $word, $type);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row):
            return $row;
        else:
            return false;
        endif;
    }

    function insert($word, $type) {
        $query = "INSERT INTO word (name, type_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $word, $type);
        $stmt->execute();

        if($stmt->affected_rows > 0):
            return true;
        else:
            return false;
        endif;
    }

    function get_lang() {
        $query = "SELECT * FROM lang_type";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row):
            return $row;
        else:
            return false;
        endif;
    }
}