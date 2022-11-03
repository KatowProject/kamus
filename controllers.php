<?php
defined("BASEPATH") or exit("No direct script access allowed");
require_once 'scraper.php';
require_once 'connection.php';

class Controller {
    function __construct() {
        $this->scraper = new Scraper();
        $this->db = $GLOBALS['db'];
    }

    function get_word($word, $type) {
        $query = "SELECT * FROM word WHERE name = '$word' AND type = '$type'";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);

        if($row) {
            return $row;
        } else {
            return false;
        }
    }
}