<?php
/* Smarty version 3.1.33, created on 2020-01-26 10:55:07
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_attributes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e2d61fb1faac3_54196041',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f04ce70107f1b309bcea1576dfdf627638f52036' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_attributes.tpl',
      1 => 1580032455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2d61fb1faac3_54196041 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_attributes",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAttributesAdmin;?>
">
    <h3> Edit the Schoolshop product Attributes: </h3>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?><p class="error"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
 </p> <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAttributesCount == 0) {?>
    <p class="no-items-found">
        There are no products Attributes found in database
    </p>
    <?php } else { ?>
    <table class="tss-table">
        <tr>
            <th>Attributes Name</th>
            <th width="240">&nbsp;</th>
        </tr>
        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAttributes) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem == $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id']) {?>
                <tr>
                    <td>
                        <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" size="30">
                    </td>
                    <td>
                        <input type="submit" name="submit_edit_attr_val_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Edit Attribute Values">
                        <input type="submit" name="submit_update_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Update">
                        <input type="submit" name="cancel" value="Cancel">
                        <input type="submit" name="submit_delete_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Delete">
                    </td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                    <td>
                        <input type="submit" name="submit_edit_val_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Edit Attribute Values">
                        <input type="submit" name="submit_edit_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Edit">
                        <input type="submit" name="submit_delete_attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAttributes[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attribute_id'];?>
" value="Delete">
                        
                    </td>
                </tr>
            <?php }?>
        <?php
}
}
?>
    </table>
    <?php }?>
    <h3> Add new Attributes: </h3>
    <p>
        <input type="text" name="attribute_name" value="[name]" size="30">
        <input type="submit" name="submit_add_attr_0" value="Add">
    </p>
</form><?php }
}
