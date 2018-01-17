<?php

if (isPost("title","start_title","start_text")) {
    $data->set("title",$_POST['title']);
    $data->set("start_title",$_POST['start_title']);
    $data->set("start_text",$_POST['start_text']);
    header("Location: ./?p=settings");
}

$d = $data->getAll();

$smarty->assign("data_title",$d['title']);
$smarty->assign("data_start_title",$d['start_title']);
$smarty->assign("data_start_text",$d['start_text']);

$smarty->assign("page","settings.tpl");
?>