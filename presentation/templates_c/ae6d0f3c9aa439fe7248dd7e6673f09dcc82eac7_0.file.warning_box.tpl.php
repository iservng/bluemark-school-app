<?php
/* Smarty version 3.1.33, created on 2020-08-06 04:25:51
  from 'C:\xampp\htdocs\bluemark\presentation\templates\warning_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f2b783f306de2_19636207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae6d0f3c9aa439fe7248dd7e6673f09dcc82eac7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\warning_box.tpl',
      1 => 1596683574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2b783f306de2_19636207 (Smarty_Internal_Template $_smarty_tpl) {
?>   <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><b style="color: red;">Warning</b></h4>
                
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</b>
                
            </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <?php }
}
