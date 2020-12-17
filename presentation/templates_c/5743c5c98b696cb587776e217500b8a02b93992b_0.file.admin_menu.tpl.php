<?php
/* Smarty version 3.1.33, created on 2020-11-22 02:28:51
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb9bed3757e25_34322451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5743c5c98b696cb587776e217500b8a02b93992b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_menu.tpl',
      1 => 1605960431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb9bed3757e25_34322451 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>

<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_menu",'assign'=>"obj"),$_smarty_tpl);?>

<li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreAdmin;?>
"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAttributesAdmin;?>
"><i class="fa fa-dashboard fa-fw"></i> Product Attributes</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
"><i class="fa fa-dashboard fa-fw"></i> Carts</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToOrdersAdmin;?>
"><i class="fa fa-dashboard fa-fw"></i> Orders</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreFront;?>
"><i class="fa fa-dashboard fa-fw"></i> Front Page</a>
                        </li>

                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToListStaffAndSettings;?>
"><i class="fa fa-dashboard fa-fw"></i>List Staff</a>
                        </li>


                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
"><i class="fa fa-dashboard fa-fw"></i> Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
"><i class="fa fa-dashboard fa-fw"></i> Logout</a>
                        </li>
<?php }
}
