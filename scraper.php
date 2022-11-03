<?php 
require_once __DIR__ . '/vendor/autoload.php';
use duzun\hQuery;

class Scraper {
    CONST URL = "http://kamus-sunda.com/sekolah-ikatan-dinas-langsung-kerja.html";


    public function get_data($word, $type) {
        $get_html = $this->get_html($word, $type);
        $doc = hQuery::fromHTML($get_html);

        $words = $doc->find("div.result3")->text();
        $pword = $doc->find("div.tkata");

        $arr_words = [];
        foreach($pword as $word) {
            array_push($arr_words, $word->text());
        }

        return [
            'text' => $words,
            'words' => $arr_words
        ];
    }


    private function get_html($word, $type) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        // form data
        curl_setopt($ch, CURLOPT_POSTFIELDS, "text=$word&md=$type");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);

        curl_close($ch);

        return $server_output;
    }
}