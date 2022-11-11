<?php 
defined("BASEPATH") or exit("No direct script access allowed");

include_once 'connection.php';

class Database {    
    public $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
            exit();
        }

        echo "Connected to MySQL";
    }

    function get($word, $type) {
        $query = "SELECT * FROM word WHERE name = '$word' AND type = '$type' JOIN lang_type ON word.lang_id = lang_type.id";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);

        if($row) {
            return $row;
        } else {
            return false;
        }
    }

    function insert($word, $type, $text, $words) {
        $query = "INSERT INTO word (name, type, text) VALUES ('$word', '$type', '$text')";
        $result = mysqli_query($this->db, $query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}