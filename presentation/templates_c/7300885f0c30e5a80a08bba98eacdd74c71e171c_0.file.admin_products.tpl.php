<?php
/* Smarty version 3.1.33, created on 2020-01-27 03:41:40
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2e4de4065d37_11969011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7300885f0c30e5a80a08bba98eacdd74c71e171c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_products.tpl',
      1 => 1580038976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2e4de4065d37_11969011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_products",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCategoryProductsAdmin;?>
">
    <h3>
    Editing product for category: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategoryName;?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentCategoriesAdmin;?>
">Back to categories ...</a>]
    </h3>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
        <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProductsCount == 0) {?>
        <p class="no-items-found">There are no products in this category</p>
    <?php } else { ?>
        <table class="tss-table">
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Discounted Price</td>
                <td width="80">&nbsp;</td>
            </tr>
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['description'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['price'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['discounted_price'];?>
</td>
                <td>
                    <input type="submit" name="submit_edit_prod_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product_id'];?>
" value="Edit">
                </td>
            </tr>
            <?php
}
}
?>
        </table>
    <?php }?>
    <h3> Add new product </h3>
    <p>
        <input type="text" name="product_name" value="[value]" size="30">
        <input type="text" name="product_description" value="[description]" size="60">
        <input type="text" name="product_price" value="price" size="10">
        <input type="submit" name="submit_add_prod_0" value="Add">
    </p>
</form><?php }
}
