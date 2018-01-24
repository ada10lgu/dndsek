<?php
class Wiki {

    public $acceptedChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQERSTUVWXYZ1234567890-_()";

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
        $sql = "SELECT * FROM wiki WHERE title = ? ORDER BY created DESC LIMIT 1";
        $result = $GLOBALS['database']->query($sql,$a);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Article($row);
        } else {
            return null;
        }
    }

    public function update($a,$wiki,$wikiadmin,$access){
        if (!isAdmin()) {
            $old = $this->getArticle($a);
            if ($old != null) {
                $wikiadmin = $old->adminText;
            } else {
                $wikiadmin = "";
            }

            if (!isAdmin() && $old!= null) {
                $access = $old->access;
            }

        }
        $user = getLoggedInUser();
        $id = $user['id'];

        $sql = "INSERT INTO wiki (created,user,access,title,text,admin_text) VALUES (CURRENT_TIME(),?,?,?,?,?)";
        $GLOBALS['database']->query($sql,$id,$access,$a,$wiki,$wikiadmin);
        return true;
    }
}
class Article {

    public $title;
    public $text;
    public $adminText;
    public $access;
    
    public function __construct($row) {
        if (is_array($row)) {
            $this->title = $row['title'];
            $this->text = $row['text'];
            $this->adminText = $row['admin_text'];
            $this->access = $row['access'];
        } else {
            $this->title = $row;
            $this->text = "";
            $this->adminText = "";
            $this->access = 0;
        }
    }

    public function canEdit() {
        if ($this->access === 0) {
            return true;
        } else {
            return getLoggedInUser()['admin'];
        }
    }

    public function render() {
        return $this->renderText($this->text);
    }

    public function renderAdmin() {
        return $this->renderText($this->adminText);
    }

    private function renderText($text) {
         //Fixes the headers
         $text = preg_replace("/======\\s+(.+?)\\s+======/i","<h6>$1</h6>",$text);
         $text = preg_replace("/=====\\s+(.+?)\\s+=====/i","<h5>$1</h5>",$text);
         $text = preg_replace("/====\\s+(.+?)\\s+====/i","<h4>$1</h4>",$text);
         $text = preg_replace("/===\\s+(.+?)\\s+===/i","<h3>$1</h3>",$text);
         $text = preg_replace("/==\\s+(.+?)\\s+==/i","<h2>$1</h2>",$text);
         $text = preg_replace("/=\\s+(.+?)\\s+=/i","<h1>$1</h1>",$text);
 
         // Horizontal line
         $text = preg_replace("/----/i","<hr />",$text);
 
         // Fixes newlines
         $text = preg_replace('~\R~u', "\n", $text);
         $text = preg_replace("/\n\n/i","<br />\n",$text);
 
         // Some text formating
         $text = preg_replace("/'''(.*?)'''/i","<b>$1</b>",$text);
         $text = preg_replace("/''(.*?)''/i","<i>$1</i>",$text);
         
         // Links
         //$text = preg_replace("/\\[\\[(.*?)\\|(.*?)\\]\\]/i","<a href=\"./?p=library&a=$1\">$2</a>",$text);
         $text = preg_replace("/\\[\\[http:\\/\\/(.*?)\\]\\]/i","<a target=\"_blank\" href=\"http:\\/\\/$1\">$1</a>",$text);
         $text = preg_replace("/\\[\\[https:\\/\\/(.*?)\\]\\]/i","<a target=\"_blank\" href=\"https:\\/\\/$1\">$1</a>",$text);
         $text = preg_replace("/\\[\\[(.*?)\\]\\]/i","<a href=\"./?p=library&a=$1\">$1</a>",$text);
 
         return $text;
    }

}
?>