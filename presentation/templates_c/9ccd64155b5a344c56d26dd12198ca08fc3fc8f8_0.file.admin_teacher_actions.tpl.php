<?php
/* Smarty version 3.1.33, created on 2020-03-31 13:10:36
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_teacher_actions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e83333c59f269_36675277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ccd64155b5a344c56d26dd12198ca08fc3fc8f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_teacher_actions.tpl',
      1 => 1585656628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e83333c59f269_36675277 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"action_options",'assign'=>"obj"),$_smarty_tpl);?>


<ul class="dropdown-menu pull-right" role="menu">
    <li><a href="#">Send Text</a></li>
    <li><a href="#">Contact by Mail</a></li>
    <li><a href="#">On Hold</a></li>
    <li><a href="#">Employ</a></li>

    <li class="divider"></li>
    
    <li><a href="#"><b>View All</b></a></li>
</ul><?php }
}
