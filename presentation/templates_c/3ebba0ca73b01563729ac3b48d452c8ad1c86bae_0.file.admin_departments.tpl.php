<?php
/* Smarty version 3.1.33, created on 2020-01-23 10:07:25
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_departments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e29624dbcd790_89997486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ebba0ca73b01563729ac3b48d452c8ad1c86bae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_departments.tpl',
      1 => 1579700874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e29624dbcd790_89997486 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_departments",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentsAdmin;?>
">
    <h3>Edit the departments of Schoolshop: </h3>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?> <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p><?php }?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDepartmentsCount == 0) {?>
        <p class="no-items-found">There are no departments in your database!</p>
    <?php } else { ?>
        <table class="tss-table">
            <tr>
                <th width="200">Department Name</th>
                <th>Department Description</th>
                <th width="240">&nbsp;</th>
            </tr>
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mDepartments) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem == $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id']) {?>
                    <tr>
                        <td>
                            <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" size="30">
                        </td>
                        <td>
                        <textarea name="description" row="3" cols="60"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['description'];?>
</textarea>
                        </td>
                        <td>
                            <input type="submit" name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
" value="Edit Categories">
                            <input type="submit" name="submit_update_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
" value="Update">
                            <input type="submit" name="cancel" value="Cancel">
                            <input type="submit" name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
" value="Delete">
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 </td>
                        <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['description'];?>
 </td>
                        <td>
                            <input type="submit" name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
" value="Edit Categories">
                            <input type="submit" name="submit_edit_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
" value="Edit">
                            <input type="submit" name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
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
    <h3>Add new department:</h3>
    <p>
        <input type="text" name="department_name" value="[name]" size="30">
        <input type="text" name="department_description" value="[description]" size="60">
        <input type="submit" name="submit_add_dept_0" value="Add">
    </p>

</form><?php }
}
