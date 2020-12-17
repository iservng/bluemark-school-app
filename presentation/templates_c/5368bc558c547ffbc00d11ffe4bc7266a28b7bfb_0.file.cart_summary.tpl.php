<?php
/* Smarty version 3.1.33, created on 2020-02-26 05:14:49
  from 'C:\xampp\htdocs\bluemark\presentation\templates\cart_summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e55f0b9463774_93914636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5368bc558c547ffbc00d11ffe4bc7266a28b7bfb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\cart_summary.tpl',
      1 => 1582688243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e55f0b9463774_93914636 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"cart_summary",'assign'=>"obj"),$_smarty_tpl);?>


<li class="menu-has-children"><a href="">Cart</a>
    <ul>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmptyCart) {?>
        <li><a href="">Your cart is empty!</a></li>
    <?php } else { ?>
        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mItems) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> 
            <li><a href=""><?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
 x <?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)</a></li>
        <?php
}
}
?>
        <li><a href="" id="updating"></a></li>
        <li><a href=""><b>N <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</b></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartDetails;?>
"><b style="color: blue;">View Details</b></a></li>
    <?php }?>
        
       
    </ul>
</li><?php }
}
