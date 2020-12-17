<?php
/* Smarty version 3.1.33, created on 2020-01-31 13:03:31
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_carts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e341793b8dba2_47718652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '882f5876098582a20139c345447d9d3887070ada' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_carts.tpl',
      1 => 1580472201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e341793b8dba2_47718652 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_carts",'assign'=>"obj"),$_smarty_tpl);?>

<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
" method="post">

    <h3> Admin Users&#039; shopping carts:</h3>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mMessage) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMessage;?>
</p>
    <?php }?>

    <p>
    Select Cart:
    <?php echo smarty_function_html_options(array('name'=>"days",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mDaysOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedDaysNumber),$_smarty_tpl);?>

    <input type="submit" name="submit_count" value="Count Old Shopping Carts">
    <input type="submit" name="submit_delete" value="Delete Old Shopping Carts">

    </p>
</form><?php }
}
