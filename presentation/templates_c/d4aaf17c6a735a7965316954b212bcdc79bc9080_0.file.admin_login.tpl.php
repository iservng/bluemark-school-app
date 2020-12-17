<?php
/* Smarty version 3.1.33, created on 2020-01-22 12:45:01
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2835bd27c167_07292480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4aaf17c6a735a7965316954b212bcdc79bc9080' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_login.tpl',
      1 => 1579689824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2835bd27c167_07292480 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_login",'assign'=>"obj"),$_smarty_tpl);?>

<div class="login">
    <p class="login-title">Schoolshop Login</p>
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
        <p>
            Enter login information or go back to
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">Schoolshop</a>
        </p>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLoginMessage != '') {?>
            <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLoginMessage;?>
</p>
        <?php }?>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" size="35" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUsername;?>
">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" size="35" value="">
        </p>
        <p>
            <input type="submit" name="submit" value="Login">
        </p>
    </form>
</div><?php }
}
