<?php
/* Smarty version 3.1.33, created on 2020-02-04 14:54:53
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3977ad172155_83609140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bbd98541068b348b91841dc8fb7c45ee975168f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_menu.tpl',
      1 => 1580808200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3977ad172155_83609140 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_menu",'assign'=>"obj"),$_smarty_tpl);?>

<h1>Schoolshop Admin</h1>
<p>
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreAdmin;?>
">CATALOG ADMIN</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAttributesAdmin;?>
">PRODUCTS ATTRIBUTES ADMIN</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
">CARTS ADMIN</a> |

    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToOrdersAdmin;?>
">ORDERS ADMIN</a> |

    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreFront;?>
">STOREFRONT</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
">LOGOUT</a> |
</p><?php }
}
