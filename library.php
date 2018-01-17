<?php
verifyAccess();

$article = isGet("a") ? $_GET['a'] : "";

echo json_encode($article);


$smarty->assign("p","library");
$smarty->assign("page","library.tpl");

?>