<?php
verifyAccess();

require "libs/wiki.php";
$wiki = new Wiki();


if (isPost("search")) {
    $search = $wiki->parseSearch($_POST['search']);
    header("Location: ./?p=".$_GET['p']."&a=$search");
}

if (isPost("article","wiki")) {
    $a = $_POST["article"];
    if ($a != $wiki->parseSearch($a)) {
        header("Location: ./?p=something_went_wrong");
    }
    $wikiadmin = "";
    $access = 0;
    if (isPost("wikiadmin","access") && isAdmin()) {
        $wikiadmin = $_POST['wikiadmin'];
        $access = $_POST['access'];
    }
    $wiki->update($a,$_POST['wiki'],$wikiadmin,$access);
    header("Location: ./?p=".$_GET['p']."&a=$a");
}

$a = isGet("a") ? $_GET['a'] : "";

if ($a != $wiki->parseSearch($a)) {
    header("Location: ./?p=".$_GET['p']."&a=".$wiki->parseSearch($a));
}

$article = $wiki->getArticle($a);

if ($article == null) {
    $smarty->assign("page","library_edit.tpl");
    $smarty->assign("article",new Article($a));
    $smarty->assign("new",true);
} else {
    $smarty->assign("article",$article);
    $smarty->assign("wikiText","");
    $smarty->assign("adminText","");
    
    if (isGet("edit") && $article->canEdit()) {
        $smarty->assign("page","library_edit.tpl");
    } else {
        $smarty->assign("edit",$article->canEdit());
        $smarty->assign("page","library.tpl");
    }
}
?>