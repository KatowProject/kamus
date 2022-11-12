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
        // get word and get type name in relation
        $query = "SELECT word.*, lang_type.language FROM word LEFT JOIN lang_type ON word.type_id = lang_type.id WHERE word.name = ? AND word.type_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $word, $type);
        $stmt->execute();

        // return result one row
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    function insert($word) {
        $query = "INSERT INTO word (name, translated, type_id) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $word['word'], $word['translated'], $word['type']);
        $stmt->execute();

        return $stmt->affected_rows;
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