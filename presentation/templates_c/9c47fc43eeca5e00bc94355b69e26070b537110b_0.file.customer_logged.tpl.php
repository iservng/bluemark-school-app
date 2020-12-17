<?php
/* Smarty version 3.1.33, created on 2020-02-08 04:15:48
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\customer_logged.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3e27e429eea2_04596600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c47fc43eeca5e00bc94355b69e26070b537110b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\customer_logged.tpl',
      1 => 1581131742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e27e429eea2_04596600 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_logged",'assign'=>"obj"),$_smarty_tpl);?>

<div class="box">
    <p class="box-title">Welcome <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerName;?>
</p>
    <ul>
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
</div><?php }
}
