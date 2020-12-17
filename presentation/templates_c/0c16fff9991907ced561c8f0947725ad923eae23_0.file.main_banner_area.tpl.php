<?php
/* Smarty version 3.1.33, created on 2020-12-01 04:44:14
  from 'C:\xampp\htdocs\bluemark\presentation\templates\main_banner_area.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc5bc0e00cda2_66871808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c16fff9991907ced561c8f0947725ad923eae23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\main_banner_area.tpl',
      1 => 1606794249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc5bc0e00cda2_66871808 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="banner-area relative" id="home">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
          <div class="banner-content col-lg-9 col-md-12">
            <h1 class="text-uppercase">
              <?php echo $_smarty_tpl->tpl_vars['obj']->value->mIsPageMassage;?>

            </h1>
            <h4 class="pt-10 pb-10" style="color: #fff;">
              <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubPageMassage) {?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubPageMassage;?>
<hr style="color: #fff;">
              <?php }?>
                          </h4>

            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowHideAdmissionStatusBtn == true) {?>
             <a href="#check-admission-form" class="genric-btn info radius popup-with-form">Check Admission Status</a>
            <?php }?>
            
            <br><br>
            
            
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrintAdmissionLetterBtn == true) {?>

              <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
" target="_blank">
                <input type="submit" name="print_admission_letter" value="Print Admission Letter" class="genric-btn info radius">
              </form>
              
            <?php } else { ?>
              <a href="#test-form" class="primary-btn text-uppercase popup-with-form">Apply for Admission</a> 
            <?php }?>
                      </div>
        </div>
      </div>
</section><?php }
}
