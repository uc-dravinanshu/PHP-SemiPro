<?php
/* Smarty version 4.3.0, created on 2023-01-13 19:05:44
  from 'C:\xampp\htdocs\PHP-Project\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63c19d78581136_22229298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7af78e7d3609aac9a1032005a4b1641eaf907821' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP-Project\\header.tpl',
      1 => 1673633140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c19d78581136_22229298 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php echo '<?php'; ?>
 require_once('links.php'); <?php echo '?>'; ?>

  </head>
  <body>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-body-light border border-dark border-2">
                    <div class="container-fluid">
                      <a class="navbar-brand mx-2 fw-bold bg-seconday" href="index.php">
                        <img src="https://www.ucertify.com/layout/themes/bootstrap4/images/logo/ucertify_logo.png" alt="logo" class="mt-1">
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Ucertify" aria-controls="Ucertify" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-center" id="Ucertify">
                        <ul class="navbar-nav mb-2 mb-lg-0 justify-content-center">
                          <li class="nav-item">
                            <a class="nav-link active fs-3 fw-bold" aria-current="page" href="#">uCertify Prep Test</a>
                          </li> 
                        </ul>    
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
    </div>
    <?php echo '<?php'; ?>
 require_once('script.js'); <?php echo '?>'; ?>

  </body>
</html><?php }
}
