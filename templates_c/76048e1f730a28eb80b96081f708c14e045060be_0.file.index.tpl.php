<?php
/* Smarty version 4.3.0, created on 2023-01-15 09:11:49
  from 'C:\xampp\htdocs\PHP-Project\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63c3b54514c807_25537904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76048e1f730a28eb80b96081f708c14e045060be' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP-Project\\index.tpl',
      1 => 1673770232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./inc/links.tpl' => 1,
    'file:./inc/header.tpl' => 1,
    'file:./inc/script.tpl' => 1,
  ),
),false)) {
function content_63c3b54514c807_25537904 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ucertify Online Examination</title>
     <?php $_smarty_tpl->_subTemplateRender('file:./inc/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </head>
  <body>
   <?php $_smarty_tpl->_subTemplateRender('file:./inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mt-5">
                <a href="ucertify.php" class="btn btn-success" id="Start_test" name="Start_test">Start Test</a>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </body>
</html><?php }
}
