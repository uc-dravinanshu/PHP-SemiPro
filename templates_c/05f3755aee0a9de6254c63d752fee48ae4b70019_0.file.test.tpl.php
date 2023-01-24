<?php
/* Smarty version 4.3.0, created on 2023-01-24 11:24:09
  from 'C:\xampp\htdocs\PHP-Project\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63cfb1c9f25146_33718995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05f3755aee0a9de6254c63d752fee48ae4b70019' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP-Project\\test.tpl',
      1 => 1674555846,
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
function content_63cfb1c9f25146_33718995 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\PHP-Project\\smarty\\libs\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $_smarty_tpl->_subTemplateRender('file:./inc/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <title>Ucertify Online Test</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:./inc/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
           <ul class="list-group list-group-numbered">
              <li class="bg-light p-2 fw-bold fs-5">Question  : 
                <span id="question" class="bg-light p-2 fw-bold fs-5" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['content_id'];?>
"></span>
                <!-- <input type="hidden" id="Cid"/> -->
              </li>
              <li id="answer" class="fs-6 fw-bold mt-3">
                <input type="radio" name="ans" class="form-check-input abc">
                <input type="radio" name="ans" class="form-check-input abc">
                <input type="radio" name="ans" class="form-check-input abc">
                <input type="radio" name="ans" class="form-check-input abc">
              </li> 
           </ul>
        </div>
    </div>
</div>
<!-------------Modal for list-------------->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex justify-content-between">
    <div>
      <ol class="list-group">
        <?php $_smarty_tpl->_assignInScope('counter', 1);?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?> 
            <li class="list-group-item">
              <?php if ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['row']->value['content_id']] == "attempted") {?>
              <a id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="fw-bold questionList"><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
 : <?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>

                 <span class="badge text-bg-success" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
">Attempted</span>
              </a>
              <?php } else { ?>
              <a id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="fw-bold questionList"><?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
 : <?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>

                <span class="badge text-bg-danger" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
">Not Attempted</span>
              </a>
              <?php }?>
            </li>
         <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ol>
    </div>
  </div>
</div>

  <!--------- end modal ------------>
  <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Do you want to End this Exam?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-responsive">
            <thead class="table-success">
              <tr>
                <th scope="col">Total Question: </th>
                <th scope="col">Attempt Question: </th>
                <th scope="col">Not Attempt Question: </th>
                <th scope="col">Remaining Questions: </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"> <?php echo $_smarty_tpl->tpl_vars['totalpage']->value;?>
</th>
                <td></td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="No-cancel">No</button>
          <button type="button" class="btn btn-primary" id="yes-cancel">Yes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 position-fixed bottom-0">
                <ul class="pagination justify-content-center align-items-center bg-light border-top border-2 pt-2">
                  <i class="bi bi-stopwatch fs-2 mx-0"></i><div class="mx-3 fw-bold fs-5 text-dark" id="countTimer"></div>
                    <button class="page-link shadow-none fw-bold text-dark" id="list" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">List</button>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark" id="previous" type="button" data-id="<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
">Previous</button>
                    <h6><span id="current_question">1</span> of <span id="total_question"><?php echo $_smarty_tpl->tpl_vars['totalpage']->value;?>
</span></h6>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark" id="next" type="button" data-id="<?php echo smarty_function_counter(array(),$_smarty_tpl);?>
" value="submit">Next</button>
                    <button class="page-link shadow-none fw-bold text-dark" id="end-test" type="button" data-bs-toggle="modal" data-bs-target="#static">End Test</button>
                </ul>
            </div>
        </div>  
    </div>
 <?php $_smarty_tpl->_subTemplateRender('file:./inc/script.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
