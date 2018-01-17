<?php
verifyAccess();

$list = $users->getUsers();

$smarty->assign("users",$list);

$smarty->assign("page","users.tpl");
?>
