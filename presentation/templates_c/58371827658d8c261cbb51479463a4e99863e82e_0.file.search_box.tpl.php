<?php
/* Smarty version 3.1.33, created on 2020-02-24 09:08:44
  from 'C:\xampp\htdocs\bluemark\presentation\templates\search_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e53848cb2e823_97087492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58371827658d8c261cbb51479463a4e99863e82e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\search_box.tpl',
      1 => 1582531720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53848cb2e823_97087492 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"search_box",'assign'=>"obj"),$_smarty_tpl);?>

 <div class="" id="mc_embed_signup">
    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSearch;?>
" method="post">
        <div class="input-group">

        <input type="text" 
        class="form-control" 
        name="search_string" 
        placeholder="Enter your search" 
        onfocus="this.placeholder = ''" 
        onblur="this.placeholder = 'Enter your search '" 
        required="" 
        maxlength="100" id="search_string" 
        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchString;?>
" 
        maxlength="100">

        <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <span class="lnr lnr-arrow-right"></span>
        </button>
        </div>
        <p><br>
        <input type="checkbox" id="all_words" name="all_words" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllWords == "on") {?> checked="checked" <?php }?>>
            Search for all words
        </p>
        
                </div>
    </form>
                
</div><?php }
}
