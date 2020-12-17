<?php
/* Smarty version 3.1.33, created on 2020-01-29 08:53:07
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\department.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3139e3e8e454_07142387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e724e4f7f5a8b6fb429de386dd767e7a5a232c3e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\department.tpl',
      1 => 1580218130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e3139e3e8e454_07142387 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"department",'assign'=>"obj"),$_smarty_tpl);?>

<h1 class="title"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</h1>
<p class="description"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDescription;?>
</p>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" method="post" class="edit-form">
        <input type="submit" name="submit_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditAction;?>
" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditButtonCaption;?>
">
    </form>
<?php }
$_smarty_tpl->_subTemplateRender("file:products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
