<?php
/* Smarty version 3.1.33, created on 2020-02-02 06:21:39
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\cart_summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e365c6321adb0_85003865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ab2b01798e9ae65188053472825347883a78d7d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\cart_summary.tpl',
      1 => 1580620755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e365c6321adb0_85003865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"cart_summary",'assign'=>"obj"),$_smarty_tpl);?>

<div class="box" id="cart-summary">
    <p class="box-title"> Cart Summary </p>
    <div id="updating">Updating...</div>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmptyCart) {?>
        <p class="empty-cart">Your cart is empty!</p>
    <?php } else { ?>
        <table class="cart-summary">
            <tbody>
                <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mItems) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> 
                    <tr>
                        <td width="30" valign="top" align="right">
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
 x
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)
                        </td>
                    </tr>
                <?php
}
}
?>
                <tr>
                    <td colspan="2" class="cart-summary-subtotal">
                        <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</span>
                        <span>
                            [<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartDetails;?>
">Viw Details</a>]
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php }?>
</div>
<?php }
}
