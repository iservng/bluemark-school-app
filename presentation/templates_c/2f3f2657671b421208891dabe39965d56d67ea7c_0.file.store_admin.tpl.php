<?php
/* Smarty version 3.1.33, created on 2020-11-20 04:21:43
  from 'C:\xampp\htdocs\bluemark\presentation\templates\store_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb736477c34e7_11744190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f3f2657671b421208891dabe39965d56d67ea7c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\store_admin.tpl',
      1 => 1605842363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_head_tag.tpl' => 1,
    'file:admin_js.tpl' => 1,
  ),
),false)) {
function content_5fb736477c34e7_11744190 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>

<?php echo smarty_function_load_presentation_object(array('filename'=>"store_admin",'assign'=>"obj"),$_smarty_tpl);?>

<?php $_smarty_tpl->_subTemplateRender("file:admin_head_tag.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>

    <div id="wrapper">
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mMenuCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mContentCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
      
    
    <!-- /#wrapper 8-->
   <?php $_smarty_tpl->_subTemplateRender("file:admin_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html>
<?php }
}
