<?php 
require_once __DIR__ . '/vendor/autoload.php';
use duzun\hQuery;
class Scraper {
    CONST URL = "http://kamus-sunda.com/sekolah-ikatan-dinas-langsung-kerja.html";

    public $type = [
        "is" => 2,
        "ish" => 3,
        "isk" => 4,
    ];

    public function get_data($word, $type) {
        $get_html = $this->get_html($word, $type);
        $doc = hQuery::fromHTML($get_html);

        $pword = $doc->find("div.tkata");
        if (!isset($pword)) return false;
        
        $tl = null;
        foreach ($pword as $key => $value):
            $txt = $value->text();
            $w = explode(":", $txt);
            $tl = trim($w[1]);
        endforeach;

        return [
            'word' => $tl,
            'type' => $this->type[$type]
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