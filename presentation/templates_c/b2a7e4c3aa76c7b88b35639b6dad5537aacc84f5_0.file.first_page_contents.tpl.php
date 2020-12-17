<?php
/* Smarty version 3.1.33, created on 2020-01-22 10:05:07
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\first_page_contents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e281043354212_87216289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2a7e4c3aa76c7b88b35639b6dad5537aacc84f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\first_page_contents.tpl',
      1 => 1579683789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e281043354212_87216289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"first_page_contents",'assign'=>"obj"),$_smarty_tpl);?>

<p class="description">
    We hope you had fun creating Schoolshop, the E-commerce store from Beginning PHP and mySql E-commerce: From Novice to professional
</p>
<p class="description">
    We have the largest collection of T-shirt, with postal stamp on earth! Browse our departments and categories to find your favourite
</p>
<p> Access the <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">admin page</a>. </p>
<?php $_smarty_tpl->_subTemplateRender("file:products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
