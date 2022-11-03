<?php 

class Database {
    private $db;

    function __construct() {
        $this->db = $GLOBALS['db'];
    }

    function get_word($word, $type) {
        $query = "SELECT * FROM word WHERE name = '$word' AND type = '$type' JOIN lang_type ON word.lang_id = lang_type.id";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);

        if($row) {
            return $row;
        } else {
            return false;
        }
    }

    function insert_word($word, $type, $text, $words) {
        $query = "INSERT INTO word (name, type, text, words) VALUES ('$word', '$type', '$text', '$words')";
        $result = mysqli_query($this->db, $query);

        if($result) {
            return true;
        } else {
            return false;
        }
    }
}