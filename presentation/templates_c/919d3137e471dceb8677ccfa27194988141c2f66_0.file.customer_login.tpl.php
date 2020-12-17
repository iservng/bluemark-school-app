<?php
/* Smarty version 3.1.33, created on 2020-02-08 04:07:59
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\customer_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3e260f5dda28_83352063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '919d3137e471dceb8677ccfa27194988141c2f66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\customer_login.tpl',
      1 => 1581001871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e260f5dda28_83352063 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_login",'assign'=>"obj"),$_smarty_tpl);?>


<div class="box">
    <p class="box-title">Login</p>
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogin;?>
">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
            <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
        <?php }?>

        <p>
            <label for="email">E-mail address:</label>
            <input type="text" maxlength="50" name="email" size="22" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" maxlength="50" name="password" size="22">
        </p>
        <p>
            <input type="submit" name="Login" value="Login"> | 
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToRegisterCustomer;?>
">Register User</a>
        </p>
    </form>
</div><?php }
}
