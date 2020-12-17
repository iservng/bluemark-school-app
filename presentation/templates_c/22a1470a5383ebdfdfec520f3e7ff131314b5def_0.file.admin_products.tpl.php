<?php
/* Smarty version 3.1.33, created on 2020-03-10 17:06:39
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e67bb0f27c511_61434037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22a1470a5383ebdfdfec520f3e7ff131314b5def' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_products.tpl',
      1 => 1583856394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e67bb0f27c511_61434037 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_products",'assign'=>"obj"),$_smarty_tpl);?>






        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                       <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCategoryProductsAdmin;?>
">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing product for category:<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCategoryName;?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentCategoriesAdmin;?>
">Back to categories...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?><p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p><?php }?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProductsCount == 0) {?>
        <p style="color: blue;"><b>There are no products in this category</b></p>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discounted Price</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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


                                       
                                    </tbody>
                </table>
            </div>
             <?php }?>
             
             
        <div class="well">
           <h4>Add new product:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="product_name" value="[name]" size="30">
            <br>
            <input class="form-control input-sm" type="text" name="product_description" value="[description]" size="60">
            <br>
            <input class="form-control input-sm" type="text" name="product_price" value="price" size="10">
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_prod_0" value="Add">
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
