<?php
/* Smarty version 3.1.30, created on 2017-10-19 11:01:26
  from "/home/www/dndsek.fivefactorial.se/htdocs/templates/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e869e63c59f4_23871319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fd07ea4ed79ef1de2efa346988e8a5af3e581c6' => 
    array (
      0 => '/home/www/dndsek.fivefactorial.se/htdocs/templates/signup.tpl',
      1 => 1508403506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e869e63c59f4_23871319 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Signup</h1>
<form action="#" method="post">
<p>Username<br>
<input type="text" name="username"></p>
<p>Password<br>
<input type="password" name="password"></p>
<p>Repeat password<br>
<input type="password" name="password2"></p>
<p>Email<br>
<input type="text" name="email"></p>
<p><input type="submit" value="Create"></p>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php }?>
</form>
<?php }
}
