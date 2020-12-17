<?php
/* Smarty version 3.1.33, created on 2020-08-24 14:14:04
  from 'C:\xampp\htdocs\bluemark\presentation\templates\products_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f43af0c3fc844_20451607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71c3338881285cd35811bbfee4627ba2de0f0165' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\products_list.tpl',
      1 => 1598208380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f43af0c3fc844_20451607 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"products_list",'assign'=>"obj"),$_smarty_tpl);?>







<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts) {?>
  <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
            <div class="single-popular-carusel">

            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['thumbnail'] != '') {?>
              <div class="thumb-wrap relative">
                <div class="thumb relative">
                  <div class="overlay overlay-bg"></div>
                  <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['thumbnail'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['name'];?>
">
                </div>
                <div class="meta d-flex justify-content-between">
                  <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>

                  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['discounted_price'] != 0) {?>
                  <h4>N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['discounted_price'];?>
</h4>
                  <?php } else { ?>
                  <h4>N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['price'];?>
</h4>
                  <?php }?>

                </div>
              </div>
              <?php }?>

              <div class="details">
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['link_to_product'];?>
">
                  <h4>
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['name'];?>

                  </h4>
                </a>
                <p>
                  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['description'];?>

                </p>

                <p>
                                <form class="add-product-form" target="_self" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['link_to_add_product'];?>
" onclick="return addProductToCart(this);">

                                  <p>
                                          <?php
$__section_l_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes']) ? count($_loop) : max(0, (int) $_loop));
$__section_l_1_total = $__section_l_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_l'] = new Smarty_Variable(array());
if ($__section_l_1_total !== 0) {
for ($__section_l_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] = 0; $__section_l_1_iteration <= $__section_l_1_total; $__section_l_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev'] = $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] - 1;
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_next'] = $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] + 1;
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['first'] = ($__section_l_1_iteration === 1);
$_smarty_tpl->tpl_vars['__smarty_section_l']->value['last'] = ($__section_l_1_iteration === $__section_l_1_total);
?>

                                        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['first'] : null) || $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index'] : null)]['attribute_name'] !== $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev']) ? $_smarty_tpl->tpl_vars['__smarty_section_l']->value['index_prev'] : null)]['attribute_name']) {?>
<div class="form-select">
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
</div>
                    <?php
}
}
?>
                    </p>

                                        <p>
                      <input class="genric-btn success small" type="submit" name="add_to_cart" value="Add to Cart">
                    </p>
                </form>
                </p>

                <p>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton) {?>
                <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" target="_self" method="post" class="edit-form">
                  <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['product_id'];?>
">
                  <input type="submit" name="submit" value="Edit Product Details">
                </form>
                <?php }?>
                </p>



                              </div>
            </div>
  <?php
}
}
}?>



<?php }
}
