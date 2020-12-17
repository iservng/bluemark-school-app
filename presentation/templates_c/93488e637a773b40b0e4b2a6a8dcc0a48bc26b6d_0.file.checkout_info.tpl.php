<?php
/* Smarty version 3.1.33, created on 2020-02-11 14:50:30
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\checkout_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e42b126799335_38815305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93488e637a773b40b0e4b2a6a8dcc0a48bc26b6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\checkout_info.tpl',
      1 => 1581424453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e42b126799335_38815305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"checkout_info",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckout;?>
">
<h2> Your order consists of the following otems</h2>

<table class="tss-table">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartItems) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subtotal'];?>
</td>
        </tr>
    <?php
}
}
?>
</table>
<p>Total Amount: <font class="price"> N <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</font></p>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard == 'yes') {?>
    <p class="error">No credit card details stored! </p>
<?php } else { ?>
    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCreditCardNote;?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress == 'yes') {?>
    <p class="error">Shipping address required to place order!</p>
<?php } else { ?>
    <p>
        Shipping Address: <br>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_1'];?>
 <br>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_2']) {?>
            &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_2'];?>
 <br>
        <?php }?>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['city'];?>
 <br>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['region'];?>
 <br>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['postal_code'];?>
 <br>
        &nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['country'];?>
 <br>
        Shipping Region: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingRegion;?>

    </p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard != 'yes' && $_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress != 'yesy') {?>
    <p>
        Shipping type:
        <select name="shipping">
            <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mShippingInfo) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['shipping_id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['shipping_type'];?>

                </option>
            <?php
}
}
?>
        </select>
    </p>
<?php }?>

<input type="submit" name="place_order" value="Place Order" <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderButtonVisible;?>
> | 
<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCart;?>
">Edit Shopping Cart</a> | 
<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a>
</form><?php }
}
