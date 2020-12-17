<?php
/* Smarty version 3.1.33, created on 2020-02-08 04:57:16
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\customer_address.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3e319c88ebb8_77183893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ade3a1aa4efdd4d9e493c61d4a31446cbfe358b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\customer_address.tpl',
      1 => 1581134232,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e319c88ebb8_77183893 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_address",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAddressDetails;?>
">
    <h2>Please enter your email address </h2>

    <table class="customer-table">
        <tr>
            <td>Address 1:</td>
            <td>
                <input type="text" name="address1" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddress1;?>
" size="32">
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAddress1Error) {?>
                    <p class="error">Your must enter an address.</p>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Address 2:</td>
            <td>
                <input type="text" name="address2" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddress2;?>
" size="32">
            </td>
        </tr>
        <tr>
            <td>Town/City:</td>
            <td>
                <input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCity;?>
" size="32">
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCityError) {?>
                    <p class="error">You must enter a city.</p>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Region/State:</td>
            <td>
                <input type="text" name="region" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRegion;?>
" size="32">
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mRegionError) {?>
                    <p class="error">You must enter a region/state.</p>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Postal Code:/ZIP:</td>
            <td>
                <input type="text" name="postalCode" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPostalCode;?>
" size="32">
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPostalCodeError) {?>
                    <p class="error">You must enter a postal code/ZIP.</p>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Country:</td>
            <td>
                <input type="text" name="country" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCountry;?>
" size="32">
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCountryError) {?>
                    <p class="error">You must enter a country.</p>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>Shipping Region:</td>
            <td>
                <select name="shippingRegion">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mShippingRegions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mShippingRegion),$_smarty_tpl);?>
 
                </select>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShippingRegionError) {?>
                    <p class="error">You must select a shipping region.</p>
                <?php }?>
            </td>
        </tr>
    </table>
    <input type="submit" name="sended" value="Confirm"> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCancelPage;?>
">Cancel</a>
</form>

<?php }
}
