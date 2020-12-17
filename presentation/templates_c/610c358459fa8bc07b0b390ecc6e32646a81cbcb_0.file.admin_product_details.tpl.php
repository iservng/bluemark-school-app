<?php
/* Smarty version 3.1.33, created on 2020-01-28 13:58:53
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_product_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e30300d765376_06754327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '610c358459fa8bc07b0b390ecc6e32646a81cbcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_product_details.tpl',
      1 => 1580216328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e30300d765376_06754327 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_product_details",'assign'=>"obj"),$_smarty_tpl);?>

<form enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToProductDetailsAdmin;?>
">
    <h3>
        Editing product: ID # <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['product_id'];?>
 &mdash;
        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCategoryProductsAdmin;?>
">Back to products...</a>]
    </h3>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
        <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
    <?php }?>

    <table class="borderless-table">
        <tbody>
            <tr>
                <td valign="top">
                    <p class="bold-text">
                        Product Name:
                    </p>
                    <p>
                        <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
" size="30">
                    </p>
                    <p class="bold-text">
                        Product Description:
                    </p>
                    <p>
                        <textarea name="description" rows="3" cols="60"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['description'];?>
</textarea>
                    </p>
                    <p class="bold-text">
                        Product Price 
                    </p>
                    <p>
                        <input type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['price'];?>
" size="5">
                    </p>
                    <p class="bold-text">
                        Product Discounted Price 
                    </p>
                    <p>
                        <input type="text" name="discounted_price" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['discounted_price'];?>
" size="5">
                    </p>
                    <p>
                        <input type="submit" name="UpdateProductInfo" value="Update Info">
                    </p>
                </td>
                <td valign="top">
                    <p>
                        <font class="bold-text"Product belong to these categories></font>
                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProductCategoriesString;?>

                    </p>
                    <p class="bold-text">
                        Remove this product from:
                    </p>
                    <p>
                        <?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdRemove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategories),$_smarty_tpl);?>

                        <input type="submit" name="RemoveFromCategory" value="Remove" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategoryButtonDisabled) {?> disabled="disabled" <?php }?>>
                    </p>
                    <p class="bold-text">
                        Assign product to this category:
                    </p>
                    <p>
                        <?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdAssign",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mAssignOrMoveTo),$_smarty_tpl);?>

                        <input type="submit" name="Assign" value="Assign">
                    </p>
                    <p class="bold-text">
                        Move product to this category:
                    </p>
                    <p>
                        <?php echo smarty_function_html_options(array('name'=>"TargetCategoryIdMove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mAssignOrMoveTo),$_smarty_tpl);?>

                        <input type="submit" name="Move" value="Move">
                        <input type="submit" name="RemoveFromCatalog" value="Remove product from catalog" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mRemoveFromCategoryButtonDisabled) {?> disabled="disabled" <?php }?>>
                        
                    </p>
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProductAttributes) {?>
                        <p class="bold-text">
                            Product attributes:
                        </p>
                        <p>
                            <?php echo smarty_function_html_options(array('name'=>"TargetAttributeValueIdRemove",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mProductAttributes),$_smarty_tpl);?>

                            <input type="submit" name="RemoveAttributeValue" value="Remove">
                        </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCatalogAttributes) {?>
                        <p class="bold-text">
                            Assign attribute to product:
                        </p>
                        <p>
                            <?php echo smarty_function_html_options(array('name'=>"TargetAttributeValueIdAssign",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mCatalogAttributes),$_smarty_tpl);?>

                            <input type="submit" name="AssignAttributeValue" value="Assign">
                        </p>
                    <?php }?>
                    <p class="bold-text">
                        Set display option for this product:
                    </p>
                    <p>
                        <?php echo smarty_function_html_options(array('name'=>"ProductDisplay",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mProductDisplayOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mProduct['display']),$_smarty_tpl);?>

                        <input type="submit" name="SetProductDisplayOption" value="Set">
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <font class="bold-text">Image name:</font> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image'];?>

        <input name="ImageUpload" type="file" value="Upload">
        <input type="submit" name="Upload" value="Upload">
    </p>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['image']) {?>
        <p>
            <img src="product_images/<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image'];?>
" border="0" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 image">
        </p>
    <?php }?>
    <p>
        <font class="bold-text">Image 2 name:</font><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image_2'];?>

        <input name="Image2Upload" type="file" value="Upload">
        <input type="submit" name="Upload" value='Upload'>
    </p>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['image_2']) {?>
        <p>
            <img src="product_images/<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image_2'];?>
" border="0" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 image 2">
        </p>
    <?php }?>
    <p>
        <font class="bold-text">Thumbnail name:</font> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['thumbnail'];?>

        <input name="ThumbnailUpload" type="file" value="Upload">
        <input type="submit" name="Upload" value="Upload">
    </p>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['thumbnail']) {?>
        <p>
            <img src="product_images/<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['thumbnail'];?>
" border="0" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 thumbnail">
        </p>
    <?php }?>
</form><?php }
}
