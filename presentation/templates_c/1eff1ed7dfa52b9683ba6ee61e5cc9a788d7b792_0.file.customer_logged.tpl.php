<?php
/* Smarty version 3.1.33, created on 2020-09-21 13:58:44
  from 'C:\xampp\htdocs\bluemark\presentation\templates\customer_logged.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f6895742a9333_95663967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eff1ed7dfa52b9683ba6ee61e5cc9a788d7b792' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\customer_logged.tpl',
      1 => 1600689516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6895742a9333_95663967 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_logged",'assign'=>"obj"),$_smarty_tpl);?>

<li class="menu-has-children"><a href=""><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerName;?>
</a>
    <ul>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem == 'profile') {?> class="selected" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMyProfilePage;?>
">Profile</a>
        </li>
    
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem == 'account') {?> class="selected" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAccountDetails;?>
">Change Account</a>
        </li>
        <li>
            <a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem == 'credit-card') {?> class="selected" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCreditCardDetails;?>
"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCreditCardAction;?>
 CC Details 
            </a>
        </li>
        <li> 
            <a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem == 'address') {?> class="selected" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAddressDetails;?>
">
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddressAction;?>
 Address 
            </a>
        </li>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
">Logout</a>
        </li>
    </ul>
</li><?php }
}
