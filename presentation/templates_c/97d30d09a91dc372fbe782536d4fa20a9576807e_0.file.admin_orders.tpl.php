<?php
/* Smarty version 3.1.33, created on 2020-03-10 15:02:22
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e679deea2afd5_59714096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97d30d09a91dc372fbe782536d4fa20a9576807e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_orders.tpl',
      1 => 1583848938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e679deea2afd5_59714096 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),2=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_orders",'assign'=>"obj"),$_smarty_tpl);?>






<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard <small>Orders</small></h1>
    </div>
               
    </div>
            
    <div class="row">
         
        
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Order Operations: 
                    </div>
                                    <!-- /.panel-heading -->
                <div class="panel-body">


                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
                <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
                <?php }?>



                        
                    <div class="well">
                    <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
                        <input name="Page" type="hidden" value="Orders">
                        <p>
                        <b>  Show orders by customer</b>
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
                            <b> Get by order ID</b>
                             <input name="orderId" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderId;?>
">

                            <input type="submit" name="submitByOrderId" value="Go!">
                        </p>

                        <p>
                            <b> Show the most recent</b>
                            <input name="recordCount" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecordCount;?>
">
                            <b class="bold-text">orders</b>
                             <input type="submit" name="submitMostRecent" value="GO!">
                        
                        </p>
                        <p>
                        
                            <b>Show all recorded created between</b>
                            <input name="startDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStartDate;?>
">
                            <b>and</b>
                            <input name="endDate" type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEndDate;?>
">
                            <input type="submit" name="submitBetweenDates" value="GO!">

                        </p>
                        <p>
                        
                            <b>Show orders by status </b>
                            <?php echo smarty_function_html_options(array('name'=>"status",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mOrderStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedStatus),$_smarty_tpl);?>


                            <input type="submit" name="submitOrdersByStatus" value="GO!">
                        </p>

                        </form>
                    </div>              <!-- /.table-responsive -->




                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mOrders) {?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date Created</th>
                                    <th>Date Shipped</th>
                                    <th>Status</th>
                                    <th>Customer</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

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

                            </tbody>
                        </table>
                    </div>
                    <?php }?>

                    </div>
                                    <!-- /.panel-body -->
                </div>
                                <!-- /.panel -->
            </div>
     

</div>
            
</div><?php }
}
