<?php
/* Smarty version 3.1.33, created on 2020-05-12 19:09:37
  from 'C:\xampp\htdocs\bluemark\presentation\templates\staff_login_link.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebae661d4ae62_02511807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3245d28fb2dd59322c0496e3e53ae6e3c1b9fb51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\staff_login_link.tpl',
      1 => 1589306240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebae661d4ae62_02511807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"staff_links",'assign'=>"obj"),$_smarty_tpl);?>

<li class="menu-has-children"><a href="">Staffs</a>
    <ul>
    
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLoginLink;?>
">Click to login</a></li>
        <li><a href="#staff_application">Apply as a staff here</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckEmploymentStatus;?>
">Check employment status</a></li>

    </ul>
</li><?php }
}
