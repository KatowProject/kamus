<?php
defined("BASEPATH") or exit("No direct script access allowed");

require_once '../scraper.php';
require_once '../database/database.php';

class Controller extends Database {
    public $scraper;
    public function __construct() {
        parent::__construct();

        $this->scraper = new Scraper();
    }

    public $type = [
        "is" => 2,
        "ish" => 3,
        "isk" => 4,
    ];

    public function get_word($word, $type) {
        $_type = $this->type[$type];
        $result = $this->get($word, $_type);

        if($result) {
            return $result;
        } else {
            $result = $this->scraper->get_data($word, $type);
            if ($result) {
                // if type result is array
                // if (is_array($result)) {
                //     foreach ($result as $key => $value) {
                //         $this->insert($word, $_type);
                //     }

                //     return $result;
                // } else {
                //     $this->insert($word, $_type);
                //     return $result;
                // }
                return $result;
            } else {
                return false;
            }
        }
    }
}