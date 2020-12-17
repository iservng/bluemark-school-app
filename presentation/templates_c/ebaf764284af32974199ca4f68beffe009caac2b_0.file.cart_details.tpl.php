<?php
/* Smarty version 3.1.33, created on 2020-02-08 13:28:24
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\cart_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3ea968dd1909_11851806',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebaf764284af32974199ca4f68beffe009caac2b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\cart_details.tpl',
      1 => 1581164459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3ea968dd1909_11851806 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"cart_details",'assign'=>"obj"),$_smarty_tpl);?>

<div id="updating">Updating...</div>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsCartNowEmpty == 1) {?>
    <h3> Your shopping cart is empty! </h3>
<?php } else { ?>
    <h3> These are the products in your shopping cart:</h3>
    <form class="cart-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUpdateCartTarget;?>
" onsubmit="return executeCartAction(this);">
        <table class="tss-table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>&nbsp;</th>
            </tr>
            <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <tr>
                    <td>
                        <input name="itemId[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['item_id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                        (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)
                    </td>
                    <td>N <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['price'];?>
</td>
                    <td>
                        <input type="text" name="quantity[]" size="5" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
">
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subtotal'];?>
</td>
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['save'];?>
" onclick="return executeCartAction(this)">Save for later</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['remove'];?>
" onclick="return executeCartAction(this)">Remove</a>
                    </td>
                </tr>
            <?php
}
}
?>
        </table>

        <table class="cart-subtotal">
            <tr>
                <td>
                    <p>
                        Total amount:&nbsp;
                        <font class="price">N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</font>
                    </p>
                </td>
                <td align="right">
                    <input type="submit" name="update" value="Update">
                </td>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowCheckoutLink) {?>
                    <td align="right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckout;?>
">Checkout</a>
                    </td>
                <?php }?>
                
                
            </tr>
            
        </table>
    </form>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsCartLaterEmpty == 0) {?>
    <h3>Saved products to buy later</h3>
    <table class="tss-table">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>&nbsp;</th>
        </tr>
        <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>

                (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['attributes'];?>
)
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['price'];?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['move'];?>
" onclick="return executeCartAction(this)">Move to cart</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['remove'];?>
" onclick="return executeCartAction(this)">Remove</a>
            </td>
        </tr>
        <?php
}
}
?>
    </table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping) {?>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a></p>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mRecommendations) {?>
    <h2>Customer who bought this also bought:</h2>
    <ol>
       <?php
$__section_m_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mRecommendations) ? count($_loop) : max(0, (int) $_loop));
$__section_m_2_total = $__section_m_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_2_total !== 0) {
for ($__section_m_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_2_iteration <= $__section_m_2_total; $__section_m_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
        <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['link_to_product'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['product_name'];?>
</a>
        <span class="list"> - <?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['description'];?>
</span>
        </li>
       <?php
}
}
?>
    </ol>
<?php }
}
}
