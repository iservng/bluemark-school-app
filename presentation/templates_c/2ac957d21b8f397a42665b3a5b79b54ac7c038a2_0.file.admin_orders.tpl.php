<?php
/* Smarty version 3.1.33, created on 2020-02-09 14:45:55
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\admin_orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e400d136f7883_05348624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ac957d21b8f397a42665b3a5b79b54ac7c038a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\admin_orders.tpl',
      1 => 1581246654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e400d136f7883_05348624 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),2=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_orders",'assign'=>"obj"),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
    <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
<?php }?>

<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
    <input name="Page" type="hidden" value="Orders">
    <p>
        <font class="bold-text">Show orders by customer </font>
        <select name="customer_id">
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCustomers) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['customer_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['customer_id'] == $_smarty_tpl->tpl_vars['obj']->value->mCustomerId) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</option>
            <?php
}
}
?>
        </select>
        <input type="submit" name="submitByCustomer" value="Go!">
    </p>
    <p>
        <font class="bold-text">Get by order ID</font>
        <input name="orderId" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderId;?>
">
        <input type="submit" name="submitByOrderId" value="GO!">
    </p>
    <p>
        <font class="bold-text">Show the most recent</font>
        <input name="recordCount" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecordCount;?>
">
        <font class="bold-text">orders</font>
        <input type="submit" name="submitMostRecent" value="GO!">
    </p>
    <p>
        <font class="bold-text">Show all recorded created between</font>
        <input name="startDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStartDate;?>
">
        <font class="bold-text">and</font>
        <input name="endDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEndDate;?>
">
        <input type="submit" name="submitBetweenDates" value="GO!">
    </p>
    <p>
        <font class="bold-text">Show orders by status </font>
        <?php echo smarty_function_html_options(array('name'=>"status",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedStatus),$_smarty_tpl);?>

        <input type="submit" name="submitOrdersByStatus" value="GO!">
    </p>
</form>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mOrders) {?>
    <table class="tss-table">
        <tr>
            <th>Order ID</th>
            <th>Date Created</th>
            <th>Date Shipped</th>
            <th>Status</th>
            <th>Customer</th>
            <th>&nbsp;</th>
        </tr>
        <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mOrders) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
            <?php $_smarty_tpl->_assignInScope('status', $_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['status']);?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['order_id'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['created_on'],"%Y-%m-%d %T");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['shipped_on'],"%Y-%m-%d %T");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions[$_smarty_tpl->tpl_vars['status']->value];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                <td align="right">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrders[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_order_details_admin'];?>
">View Details</a>
                </td>
            </tr>
        <?php
}
}
?>
    </table>
    
<?php }
}
}
