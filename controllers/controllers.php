<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Controller extends Database
{
    public $scraper;
    public function __construct()
    {
        parent::__construct();

        $this->scraper = new Scraper();
    }

    public $type = [
        "is" => 2,
        "ish" => 3,
        "isk" => 4,
        "sih" => 1
    ];

    public $type_h = [
        "is" => "Sunda Sedang",
        "ish" => "Sunda Halus",
        "isk" => "Sunda Kasar",
        "sih" => "Indonesia"
    ];

    public function get_word($word, $type)
    {
        $_type = $this->type[$type];
        $result = $this->get(strtolower($word), $_type);

        if ($result):
            return $result;
        else:
            $result = $this->scraper->get_data($word, $type);
            if ($result):
                $a = $this->insert(
                    array(
                        'word' => $word,
                        'translated' => $result['translated'],
                        'type' => $result['type']
                    )
                );

                $this->insertLog([
                    'message' => "Added new word: $word with id: " . $a['id'],
                    'author_id' => 2
                ]);

                $result['lang'] = $this->type_h[$type];
                return $result;
            else:
                return [
                    'word' => $word,
                    'translated' => $word,
                    'lang' => 'Native'
                ];
            endif;
        endif;
    }

    public function get_word_by_id($id)
    {
        $result = $this->select("SELECT * FROM word WHERE id = $id");

        if ($result):
            return $result[0];
        else:
            return false;
        endif;
    }

    public function get_wordlist_with_type($type)
    {
        $result = $this->select("SELECT word.*, lang_type.lang FROM word LEFT JOIN lang_type ON word.type_id = lang_type.id WHERE word.type_id = $type");
        return $result;
    }

    public function get_count_words()
    {
        // get count table words with type id 1
        $id = $this->select("SELECT COUNT(*) AS count FROM word WHERE type_id = 1");
        // get count table words with type id 2
        $is = $this->select("SELECT COUNT(*) AS count FROM word WHERE type_id = 2");
        // get count table words with type id 3
        $ish = $this->select("SELECT COUNT(*) AS count FROM word WHERE type_id = 3");
        // get count table words with type id 4
        $isk = $this->select("SELECT COUNT(*) AS count FROM word WHERE type_id = 4");


        return [
            'id' => $id[0]['count'],
            'is' => $is[0]['count'],
            'ish' => $ish[0]['count'],
            'isk' => $isk[0]['count']
        ];
    }

    public function update_word($id, $data)
    {
        try {
            if (!isset($data['name']) || !isset($data['translated'])):
                return false;
            endif;

            $query = $this->update("UPDATE word SET name = '$data[name]', translated = '$data[translated]' WHERE id = $id");

            return $query;
        } catch (Exception $e) {
            return false;
        }
    }

    public function add_word($data)
    {
        try {
            if (!isset($data['name']) || !isset($data['translated'])):
                return false;
            endif;

            $query = $this->insert(
                array(
                    'word' => $data['name'],
                    'translated' => $data['translated'],
                    'type' => $data['type_id']
                )
            );

            return $query;
        } catch (Exception $e) {
            return false;
        }
    }

    function auth($username, $password)
    {
        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row):
            if (password_verify($password, $row['password'])):
                return [
                    "id" => $row['id'],
                    "name" => $row['name'],
                ];
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    function delete_word($id)
    {
        $query = "DELETE FROM word WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    function insertLog($data)
    {
        $query = "INSERT INTO log (message, author_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $data['message'], $data['author_id']);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    function getLogs()
    {
        $query = "SELECT log.*, admin.name FROM log LEFT JOIN admin ON log.author_id = admin.id ORDER BY log.id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    static function splitRemoveSpecialChars($word)
    {
        $words = preg_split('/\s+/', $word);
        $words = array_map(function ($word) {
            return preg_replace('/[^A-Za-z0-9\-]/', '', $word);
        }, $words);

        return $words;
    }
}