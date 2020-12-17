<?php
/* Smarty version 3.1.33, created on 2020-02-25 12:17:21
  from 'C:\xampp\htdocs\bluemark\presentation\templates\department.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5502416cc0a8_62700541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b05b59f3aa8d5b6630201aa9912343c327eca29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\department.tpl',
      1 => 1582629437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e5502416cc0a8_62700541 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"department",'assign'=>"obj"),$_smarty_tpl);?>



<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
								Welcome to <?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>

			</h1>	
				 </div>	
	</div>
</div>
</section>


<section class="popular-course-area section-gap">
      <div class="container">

        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 Section uniforms</h1>
              <p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDescription;?>
</p>
              <p>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton) {?>
                <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" method="post" class="edit-form">
                <input type="submit" name="submit_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditAction;?>
" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditButtonCaption;?>
">
                </form>
                <?php }?>
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="active-popular-carusel">

            <?php $_smarty_tpl->_subTemplateRender("file:products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </div>
        </div>
      </div>
    </section><?php }
}
