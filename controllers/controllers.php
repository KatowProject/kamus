<?php
defined("BASEPATH") or exit("No direct script access allowed");

require_once '../scraper.php';
require_once '../database/database.php';

class Controller extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function get_word($word, $type) {
        $result = $this->get($word, $type);
        
        if($result) {
            return $result;
        } else {
            $scraper = new Scraper();
            $result = $scraper->get($word, $type);
            if($result) {
                $this->insert($word, $type, $result['text'], $result['words']);
                return $result;
            } else {
                return false;
            }
        }
    }
}