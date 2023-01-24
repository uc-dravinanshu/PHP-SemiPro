<?php
/* Smarty version 4.3.0, created on 2023-01-24 11:15:03
  from 'C:\xampp\htdocs\PHP-Project\result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63cfafa7a76824_17511224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6526b92aab8176fa25aebc35b015526c4abd499d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP-Project\\result.tpl',
      1 => 1674553363,
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
function content_63cfafa7a76824_17511224 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <title>Ucertify | Result </title>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h1 class="text-center bg-secondary text-light">Result</h1>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col">Total Question:</th>
                            <th scope="col">Attempt Question:</th>
                            <th scope="col">Unattemept Question</th>
                            <th scope="col">Correct Question</th>
                            <th scope="col">Incorrect Question</th>
                            <th scope="col">Result:</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <th class="alert alert-warning"></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
      <div class="row">
          <div class="col-lg-12">
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mx-2" id="dashboard" name="dashboard" tabindex="0"><i class="bi bi-house-door"></i> 
                  <span class="mx-2">Go To Dashboard</span></button>
                <button type="button" class="btn btn-success mx-2" onclick="" id="ReportCard" name="ReportCard" tabindex="0"><i class="bi bi-download"></i>
                  <span class="mx-2">Download Report Card</span> 
                </button>
              </div>
          </div>
      </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h1 class="text-center text-light bg-primary fs-2">All Questions</h1>
                <table class="table table-striped text-center">
                    <thead>
                      <tr>
                        <th scope="col">Index</th>
                        <th scope="col">Questions</th>
                        <th scope="col">Options</th>
                        <th scope="col">Results</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td> 
                            <span class="mx-2 bg-light shadow fs-5">A</span>
                            <span class="mx-2 bg-light shadow fs-5">B</span>
                            <span class="mx-2 bg-light shadow fs-5">C</span>
                            <span class="mx-2 bg-light shadow fs-5">D</span>   
                        </td>
                        <td>
                            <span class="bg-light shadow">Attempt</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
