<?php
verifyAccess();

require "libs/wiki.php";
$wiki = new Wiki();


if (isPost("search")) {
    $search = $wiki->parseSearch($_POST['search']);
    header("Location: ./?p=".$_GET['p']."&a=$search");
}

$a = isGet("a") ? $_GET['a'] : "";

if ($a != $wiki->parseSearch($a)) {
    header("Location: ./?p=".$_GET['p']."&a=".$wiki->parseSearch($a));
}

$article = $wiki->getArticle($a);

if ($article == null) {
    $smarty->assign("page","library_new.tpl");
    $smarty->assign("article",$a);
} else {
    $smarty->assign("page","library.tpl");
    $smarty->assign("article",$article);
}
?>