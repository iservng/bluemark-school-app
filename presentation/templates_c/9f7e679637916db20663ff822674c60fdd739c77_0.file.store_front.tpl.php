<?php
/* Smarty version 3.1.33, created on 2020-02-08 13:27:17
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\store_front.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e3ea925295b52_80807205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f7e679637916db20663ff822674c60fdd739c77' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\store_front.tpl',
      1 => 1581163861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:search_box.tpl' => 1,
    'file:departments_list.tpl' => 1,
  ),
),false)) {
function content_5e3ea925295b52_80807205 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "site.conf", null, 0);
?>

<?php echo smarty_function_load_presentation_object(array('filename'=>"store_front",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPageTitle;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/tshirtshop.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/ajax.js"><?php echo '</script'; ?>
>
  </head>
  <body>
    <div id="doc" class="yui-t2">
        <div id="bd">
            <div id="yui-main">
                <div class="yui-b">
                    <div id="header" class="yui-g">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/tshirtshop.png" alt="tshirtshop logo" />
                        </a>
                    </div>
                    <div id="contents" class="yui-g">
                        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    </div>
                </div>
            </div>
            <div class="yui-b">
            
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mLoginOrLoggedCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mHideBoxes) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:search_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:departments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mCategoriesCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mCartSummaryCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
                
               
            </div>
        </div>
    </div>

  </body>
</html>
<?php }
}
