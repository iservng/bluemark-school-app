<?php
/* Smarty version 3.1.33, created on 2020-01-20 13:42:13
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\search_results.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e25a0257f1a50_00615166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a842287f6b6f88afe00e8ab9f847dc0e41e7e88' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\search_results.tpl',
      1 => 1579524124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e25a0257f1a50_00615166 (Smarty_Internal_Template $_smarty_tpl) {
?><h1> Search Results </h1>
<?php $_smarty_tpl->_subTemplateRender("file:products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
