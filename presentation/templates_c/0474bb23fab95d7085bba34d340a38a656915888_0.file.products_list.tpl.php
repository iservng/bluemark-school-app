<?php
/* Smarty version 3.1.33, created on 2020-02-02 06:21:36
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\products_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e365c6002ab30_58532263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0474bb23fab95d7085bba34d340a38a656915888' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\products_list.tpl',
      1 => 1580550663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e365c6002ab30_58532263 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"products_list",'assign'=>"obj"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mSearchDescription != '') {?>
  <p class="description"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchDescription;?>
 </p>
<?php }?>

<?php if (count($_smarty_tpl->tpl_vars['obj']->value->mProductListPages) > 0) {?>
  <p>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage;?>
">Previous Page</a>
    <?php }?>

      <?php
$__section_m_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProductListPages) ? count($_loop) : max(0, (int) $_loop));
$__section_m_0_total = $__section_m_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_0_total !== 0) {
for ($__section_m_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_0_iteration <= $__section_m_0_total; $__section_m_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next'] = $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] + 1;
?>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPage == (isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next'] : null)) {?>
          <strong> <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next'] : null);?>
 </strong>
        <?php } else { ?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProductListPages[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)];?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index_next'] : null);?>
</a>
        <?php }?>
      <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage;?>
"> Next Page</a>
    <?php }?>
  </p>
<?php }?>





<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts) {?>
    <table class="product-list" border="0">
        <tbody>
            <?php
$__section_k_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_k_1_total = $__section_k_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_1_total !== 0) {
for ($__section_k_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_1_iteration <= $__section_k_1_total; $__section_k_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['first'] = ($__section_k_1_iteration === 1);
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['last'] = ($__section_k_1_iteration === $__section_k_1_total);
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)%2 == 0) {?>
                  <tr>
                <?php }?>
                      <td valign="top">
                          <h3 class="product-title">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['link_to_product'];?>
">
                              <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['name'];?>

                            </a>
                          </h3>
                          <p>
                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['thumbnail'] != '') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['link_to_product'];?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['thumbnail'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['name'];?>
">
                              </a>
                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['description'];?>

                          </p>
                          <p class="section">
                            Price
                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['discounted_price'] != 0) {?>
                                <span class="old-price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['price'];?>
</span>
                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['discounted_price'];?>
</span>
                            <?php } else { ?>
                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['price'];?>
</span>
                            <?php }?>
                          </p>

                                                    <form class="add-product-form" target="_self" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['link_to_add_product'];?>
" onclick="return addProductToCart(this);">

                                                    <p class="attributes">
                                                          <?php
$__section_l_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes']) ? count($_loop) : max(0, (int) $_loop));
$__section_l_2_total = $__section_l_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_l'] = new Smarty_Variable(array());
if ($__section_l_2_total !== 0) {
for ($__section_l_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] = 0; $__section_l_2_iteration <= $__section_l_2_total; $__section_l_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev'] = $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] - 1;
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_next'] = $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] + 1;
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['first'] = ($__section_l_2_iteration === 1);
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['last'] = ($__section_l_2_iteration === $__section_l_2_total);
?>

                                                                    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['first'] : null) || $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_name'] !== $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev'] : null)]['attribute_name']) {?>

                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_name'];?>
:
                                        <select name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_name'];?>
">

                                  <?php }?>

                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_value'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_value'];?>

                                      </option>

                                                                    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['last'] : null) || $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_name'] !== $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_next'] : null)]['attribute_name']) {?>
                                </select>
                                  <?php }?>

                              <?php
}
}
?>
                          </p>

                                                    <p>
                            <input type="submit" name="add_to_cart" value="Add to Cart">
                          </p>
                          </form>


                                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton) {?>
                            <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" target="_self" method="post" class="edit-form">
                              <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['product_id'];?>
">
                              <input type="submit" name="submit" value="Edit Product Details">
                            </form>
                          <?php }?>

                      </td>


                      <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)%2 != 0 && !(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['first'] : null) || (isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['last'] : null)) {?>
                        <tr>
                      <?php }?>
            <?php
}
}
?>
        </tbody>
    </table>
<?php }
}
}
