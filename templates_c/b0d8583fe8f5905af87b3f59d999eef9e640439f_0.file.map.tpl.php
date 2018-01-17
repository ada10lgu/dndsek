<?php
/* Smarty version 3.1.30, created on 2017-10-21 11:35:23
  from "/home/www/dndsek.fivefactorial.se/htdocs/templates/map.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59eb14db00de58_16853293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0d8583fe8f5905af87b3f59d999eef9e640439f' => 
    array (
      0 => '/home/www/dndsek.fivefactorial.se/htdocs/templates/map.tpl',
      1 => 1508539520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59eb14db00de58_16853293 (Smarty_Internal_Template $_smarty_tpl) {
?>
<svg id="color-fill" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">
  
  <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20"></polygon>
  
</svg>

<h1>Color Fill with anchor</h1>

<svg id="color-fill-anchor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">
  
  <a xlink:href="http://viget.com">
    <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20" fill="#fa5"></polygon>
  </a>
  
</svg>

<h1>Image Fill</h1>

<svg id="image-fill" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">

  <defs>
     <pattern id="image-bg" x="0" y="0" height="300" width="300" patternUnits="userSpaceOnUse">
       <image width="300" height="300" xlink:href="http://placekitten.com/306/306"></image>
    </pattern>
  </defs>
  
  <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20" fill="url('#image-bg')"></polygon>
  
</svg>
<?php }
}
