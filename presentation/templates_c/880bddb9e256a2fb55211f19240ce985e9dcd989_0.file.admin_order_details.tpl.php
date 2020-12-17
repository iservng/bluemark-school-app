<?php
/* Smarty version 3.1.33, created on 2020-02-13 16:22:25
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_order_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e4569b1a9aea3_76527174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '880bddb9e256a2fb55211f19240ce985e9dcd989' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_order_details.tpl',
      1 => 1581605772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4569b1a9aea3_76527174 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_order_details",'assign'=>"obj"),$_smarty_tpl);?>

<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
    <h3>
        Editing details for order ID:
        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['order_id'];?>

        [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToOrdersAdmin;?>
">Back to admin orders...</a>]
    </h3>
        <input type="hidden" name="Page" value="OrderDetails">
    <input type="hidden" name="OrderId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['order_id'];?>
">
    <table class="borderless-table">
        <tr>
            <td class="bold-text">Total Amount:</td>
            <td class="price">
                $<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['total_amount'];?>

            </td>
        </tr>
        <tr>
            <td class="bold-text">Tax:</td>
            <td class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['tax_type'];?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTax;?>
</td>
        </tr>
        <tr>
            <td class="bold-text">Tax:</td>
            <td class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['tax_type'];?>
 N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTax;?>
</td>
        </tr>
        <tr>
            <td class="bold-text">Shipping:</td>
            <td class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['shipping_type'];?>
</td>
        </tr>
        <tr>
            <td class="bold-text"> Date Created: </td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['created_on'],"%Y-%m-%d %T");?>
</td>
        </tr>
        <tr>
            <td class="bold-text"> Date Shipped: </td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['shipped_on'],"%Y-%m-%d %T");?>
</td>
        </tr>
        <tr>
            <td class="bold-text"> Status: </td>
            <td>
                <select name="status" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?> disabled="disabled" <?php }?>>
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['status']),$_smarty_tpl);?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="bold-text">Authorization Code:</td>
            <td>
                <input type="text" name="authCode" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['auth_code'];?>
" size="50" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?> disabled="disabled" <?php }?>>

            </td>
        </tr>
        <tr>
            <td class="bold-text">Reference Number:</td>
            <td>
                <input name="reference" type="text" size="50" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['reference'];?>
" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?> disabled="disabled" <?php }?>>
            </td>
        </tr>
        <tr>
            <td class="bold-text"> Comments: </td>
            <td>
                <input name="comments" type="text" size="50" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderInfo['comments'];?>
" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?>
                    disabled="disabled"
                <?php }?> />

            </td>
        </tr>
         <tr>
            <td class="bold-text"> Custome Name: </td>
            <td>
                <input name="customerName" type="text" size="50" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['name'];?>
" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?>
                    disabled="disabled"
                <?php }?> />

            </td>
        </tr>

        <tr>
            <td class="bold-text" valign="top"> Shipping Address: </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['address_1'];?>
 <br>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['address_2']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['address_2'];?>
 <br>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['city'];?>
 <br>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['region'];?>
 <br>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['postal_code'];?>
 <br>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['country'];?>
 <br>

            </td>
        </tr>
        <tr>
            <td class="bold-text"> Customer Email: </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerInfo['email'];?>

            </td>
        </tr>
    </table>
    <p>
        <input type="submit" name="submitEdit" value="Edit" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?>
            disabled="disabled"
        <?php }?>>
        <input type="submit" name="submitUpdate" value="Update" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?>
            disabled="disabled"
        <?php }?>>
        <input type="submit" name="submitCancel" value="Cancel" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mEditEnabled) {?>
            disabled="disabled"
        <?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProcessButtonText) {?>
            <input type="submit" name="submitProcessOrder" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProcessButtonText;?>
">
        <?php }?>
        
    </p>
    <h3> Order contains these products : </h3>
    <table class="tss-table">
        <tr>
            <th>Product ID </th>
            <th>Product Name </th>
            <th>Quantity </th>
            <th>Unit Cost </th>
            <th>Subtotal</th>
        </tr>
        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mOrderDetails) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product_id'];?>
</td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['product_name'];?>
 
                    (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)
                </td>
                <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
</td>
                <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['unit_cost'];?>
</td>
                <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderDetails[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subtotal'];?>
</td>
            </tr>
        <?php
}
}
?>
    </table>
    <h3>Order audit trail:</h3>
    <table class="tss-table">
        <tr>
            <th>Audit ID</th>
            <th>Created On</th>
            <th>Code</th>
            <th>Message</th>
        </tr>
        <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAuditTrail) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['audit_id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['created_on'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['code'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAuditTrail[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['message'];?>
</td>
            </tr>
        <?php
}
}
?>
    </table>
</form><?php }
}
