<?php
/* Smarty version 3.1.33, created on 2020-01-20 09:28:14
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\search_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e25649ebbbad7_36707846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c549b9621bedf52678b63260a2a79f3a8782a7c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\search_box.tpl',
      1 => 1579388903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e25649ebbbad7_36707846 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"search_box",'assign'=>"obj"),$_smarty_tpl);?>


<div class="box">
    <p class="box-title"> Search the Catalog</p>
    <form class="search_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSearch;?>
">
        <p>
            <input maxlength="100" id="search_string" name="search_string" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchString;?>
" size="19">
            <input type="submit" value="GO!"><br>
        </p>
        <p>
            <input type="checkbox" id="all_words" name="all_words" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllWords == "on") {?> checked="checked" <?php }?>>
            Search for all words
        </p>

    </form>
</div>
<?php }
}
