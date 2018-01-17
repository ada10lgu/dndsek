<?php


$d = $data->getAll();
$title = $d['start_title'];
$text = $d['start_text'];


$smarty->assign("page","start.tpl");
$smarty->assign("title", $title);
$smarty->assign("text", $text);


?>
