<?php
/* Smarty version 3.1.30, created on 2017-10-25 09:04:48
  from "/home/www/dndsek.fivefactorial.se/htdocs/templates/settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59f037900db8a9_03383682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b7b491df0e573801c562fc3ea1b77269d78627d' => 
    array (
      0 => '/home/www/dndsek.fivefactorial.se/htdocs/templates/settings.tpl',
      1 => 1508915077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f037900db8a9_03383682 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form method="post" action="#">
<h1>General settings</h1>
<p>
 Page title
 <br>
 <input type="input" name="title" value="<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
">
</p>

<h1>Start page</h1>
<p>
 Title
 <br>
 <input type="input" name="start_title" value="<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
">
</p>
<p>
 Text
 <br>
 <input type="input" name="start_text" value="<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
">
</p>

<p></p>
<p>
<input type="submit" value="Save all">
</p>
</form>
<?php }
}
