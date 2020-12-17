<?php
/* Smarty version 3.1.33, created on 2020-03-10 11:52:23
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_department_container.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e677167c19933_13794823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1246f4018aa8e7268a9dcf77fcdfb69ff5c1c7ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_department_container.tpl',
      1 => 1583837208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_all_record.tpl' => 1,
    'file:primary_applicant_table.tpl' => 1,
    'file:nursery_applicant_table.tpl' => 1,
    'file:secondary_applicant_table.tpl' => 1,
    'file:teacher_applicant_table.tpl' => 1,
    'file:admin_departments.tpl' => 1,
  ),
),false)) {
function content_5e677167c19933_13794823 (Smarty_Internal_Template $_smarty_tpl) {
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php $_smarty_tpl->_subTemplateRender("file:admin_all_record.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <!-- /.row -->
            <div class="row">
                <?php $_smarty_tpl->_subTemplateRender("file:primary_applicant_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!-- /.col-lg-6 -->
                <?php $_smarty_tpl->_subTemplateRender("file:nursery_applicant_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php $_smarty_tpl->_subTemplateRender("file:secondary_applicant_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!-- /.col-lg-6 -->
                <?php $_smarty_tpl->_subTemplateRender("file:teacher_applicant_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php $_smarty_tpl->_subTemplateRender("file:admin_departments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            
            </div><?php }
}
