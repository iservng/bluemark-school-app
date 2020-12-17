<?php
/* Smarty version 3.1.33, created on 2020-03-10 16:47:23
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e67b68bd263f9_08024750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15310362f66c0521444d3c7fc18d7208e118a3f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_categories.tpl',
      1 => 1583855227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e67b68bd263f9_08024750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_categories",'assign'=>"obj"),$_smarty_tpl);?>






        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                       <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentCategoriesAdmin;?>
">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing Categories for department:<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartmentName;?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentsAdmin;?>
">Back to department...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?><p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p><?php }?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCategoriesCount == 0) {?>
        <p style="color: blue;"><b>There  are no categories in this department!</b></p>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCategories) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem == $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id']) {?>
                                        <tr>
                                           
                                            <td>
                                                <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" size="30">
                                            </td>
                                            <td>
                                                <textarea name="description" rows="3" cols="60"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['description'];?>
</textarea>
                                            </td>
                                            
                                            <td>
                                               <input type="submit" name="submit_edit_prod_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Edit Products">
                                                <input type="submit" name="submit_update_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Update">
                                                <input type="submit" name="cancel" value="Cancel">
                                                <input type="submit" name="submit_delete_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Delete">
                                            </td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>
                                            
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['description'];?>
</td>
                                          
                                            <td>
                                                  <input type="submit" name="submit_edit_prod_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Edit Products">
                                                    <input type="submit" name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Edit">
                                                    <input type="submit" name="submit_delete_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategories[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_id'];?>
" value="Delete">
                                            </td>
                                        </tr>
                                         <?php }?>
                                    <?php
}
}
?>


                                       
                                    </tbody>
                </table>
            </div>
             <?php }?>
             
             
        <div class="well">
           <h4>Add new category:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="category_name" value="[name]" size="30">
            <br>
            <input class="form-control input-sm" type="text" name="category_description" value="[description]" size="60">
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_cat_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
<?php }
}
