<?php
class Wiki {

    public $acceptedChars = "abcdefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQERSTUVXYZ1234567890-_()";

    public function parseSearch($search) {
        $search = str_replace(" ","_",$search);
        for ($i = 0; $i < strlen($search); $i++){
            if (strpos($this->acceptedChars,$search[$i]) === false) {
                return "illegal_search";
            }
        }
        return $search;
    }

    public function getArticle($a) {
        $sql = "SELECT * FROM wiki WHERE title = '$a'";
        $result = $GLOBALS['database']->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Article($row);
        } else {
            return null;
        }
    }
}
class Article {

public function __construct($row) {
    echo json_encode($row);
}

}
?>