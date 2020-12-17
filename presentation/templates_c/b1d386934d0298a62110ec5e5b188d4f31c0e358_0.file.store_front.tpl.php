<?php
/* Smarty version 3.1.33, created on 2020-12-01 04:37:40
  from 'C:\xampp\htdocs\bluemark\presentation\templates\store_front.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc5ba84d7b122_75640246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1d386934d0298a62110ec5e5b188d4f31c0e358' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\store_front.tpl',
      1 => 1606793752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head_tag.tpl' => 1,
    'file:header_tag.tpl' => 1,
    'file:main_banner_area.tpl' => 1,
    'file:feature_area.tpl' => 1,
    'file:customer_login.tpl' => 1,
    'file:upcoming_events_area.tpl' => 1,
    'file:parent_testimonial_area.tpl' => 1,
    'file:become_an_instructor_area.tpl' => 1,
    'file:blog.tpl' => 1,
    'file:brochure.tpl' => 1,
    'file:pin_form.tpl' => 1,
    'file:teacher_apply_form.tpl' => 1,
    'file:check_admission_status_form.tpl' => 1,
    'file:footer.tpl' => 1,
    'file:js_files.tpl' => 1,
  ),
),false)) {
function content_5fc5ba84d7b122_75640246 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "site.conf", null, 0);
?>

<?php echo smarty_function_load_presentation_object(array('filename'=>"store_front",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE html>
<html lang="en" class="no-js">
  <?php $_smarty_tpl->_subTemplateRender("file:head_tag.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <body>


    <!-- header stars here  -->
   <?php $_smarty_tpl->_subTemplateRender("file:header_tag.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
    
   
<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mHideBoxes) {?>
    <!-- start banner Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:main_banner_area.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End banner Area -->

    <!-- Start feature Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:feature_area.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End feature Area -->
<?php }?>
    <!-- Start popular-course Area -->
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <!-- End popular-course Area -->

<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mHideBoxes) {?>
    <!-- Start search-course Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:customer_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End search-course Area -->


    <!-- Start upcoming-event Area start here tt-->
    <?php $_smarty_tpl->_subTemplateRender("file:upcoming_events_area.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End upcoming-event Area -->

    <!-- Start review/testimonial Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:parent_testimonial_area.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End review Area -->

    <!-- Start become an instructor Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:become_an_instructor_area.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End cta-one Area -->

    <!-- Start blog Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:blog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End blog Area -->

    <!-- Start brochure Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:brochure.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- End brochure Area -->
<?php }?>
<!-- form itself -->
    <?php $_smarty_tpl->_subTemplateRender("file:pin_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:teacher_apply_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:check_admission_status_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- start footer Area -->
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   
    <!-- End footer Area -->

    <?php $_smarty_tpl->_subTemplateRender("file:js_files.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </body>
</html>
<?php }
}
