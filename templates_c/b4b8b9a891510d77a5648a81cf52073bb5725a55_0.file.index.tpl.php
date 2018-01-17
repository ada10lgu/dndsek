<?php
/* Smarty version 3.1.30, created on 2017-10-25 08:22:15
  from "/home/www/dndsek.fivefactorial.se/htdocs/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59f02d973597b3_87432102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4b8b9a891510d77a5648a81cf52073bb5725a55' => 
    array (
      0 => '/home/www/dndsek.fivefactorial.se/htdocs/templates/index.tpl',
      1 => 1508912531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f02d973597b3_87432102 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
<link rel="stylesheet" href="styles/<?php echo $_smarty_tpl->tpl_vars['page_style']->value;?>
">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>

<div class="container">

<header>
   <h1>title</h1>
</header>
  
<nav>
<div class="menuItem"><a href="./">Start</a></div>
<?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
<div class="menuItem"><a href="./?p=map">Maproom</a></div>
<div class="menuItem"><a href="./?p=roster">Roster</a></div>
<div class="menuItem"><a href="./?p=library">Library</a></div>
<div class="menuItem"><a href="./?p=users">Users</a></div>
<div class="menuItem"><?php echo $_smarty_tpl->tpl_vars['self']->value['username'];?>
</div>
<div class="menuItem"><a href="./?p=login&a=logout">Logout</a></div>
<?php if ($_smarty_tpl->tpl_vars['self']->value['admin']) {?>
<div class="menuItem"><a href="./?p=settings">Settings</a></div>
<?php }
} else { ?>
<div class="menuItem"><a href="./?p=login">Login</a></div>
<?php }?>
</nav>

<article>
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['page']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</article>

<footer>&copy; fivefactorial.se</footer>

</div>

</body>
</html>

<?php }
}
