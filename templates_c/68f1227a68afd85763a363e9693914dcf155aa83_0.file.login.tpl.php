<?php
/* Smarty version 3.1.30, created on 2017-10-19 09:49:19
  from "/home/www/dndsek.fivefactorial.se/htdocs/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e858ff7d1ce1_26729409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68f1227a68afd85763a363e9693914dcf155aa83' => 
    array (
      0 => '/home/www/dndsek.fivefactorial.se/htdocs/templates/login.tpl',
      1 => 1508399358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e858ff7d1ce1_26729409 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Login</h1>
<form action="#" method="post">
<p>Username<br>
<input type="text" name="username"></p>
<p>Password<br>
<input type="password" name="password"></p>
<p><input type="submit" value="Login"></p>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php }?>
<p>Not a memeber yet?<br><a href="./?p=login&a=signup">Sign up</a></p>
</form>
<?php }
}
