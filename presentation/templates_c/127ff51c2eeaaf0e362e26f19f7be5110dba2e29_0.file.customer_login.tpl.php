<?php
/* Smarty version 3.1.33, created on 2020-11-16 19:43:19
  from 'C:\xampp\htdocs\bluemark\presentation\templates\customer_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb2c847a30ce9_55457845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '127ff51c2eeaaf0e362e26f19f7be5110dba2e29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\customer_login.tpl',
      1 => 1605544053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb2c847a30ce9_55457845 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_login",'assign'=>"obj"),$_smarty_tpl);?>


<section class="search-course-area relative" id="student_login">
      <div class="overlay overlay-bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6 col-md-6 search-course-left">
            <h1 class="text-white">
              Get reduced fee <br>
              during this Summer!
            </h1>
            <p>
              inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
            </p>
            <div class="row details-content">
              <div class="col single-detials">
                <span class="lnr lnr-graduation-hat"></span>
                <a href="#"><h4>Expert Instructors</h4></a>
                <p>
                  Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                </p>
              </div>
              <div class="col single-detials">
                <span class="lnr lnr-license"></span>
                <a href="#"><h4>Certification</h4></a>
                <p>
                  Usage of the Internet is so becoming more common due to rapid advancement of technology and power.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 search-course-right section-gap">
          
            <form class="form-wrap" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogin;?>
">
              <h4 class="text-white pb-20 text-center mb-30">Student LOGIN below</h4>

              <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage) {?>
            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p>
            <?php }?>

              <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" size="22" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
" maxlength="50">

              <input type="password" class="form-control" name="password" placeholder="Your Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'" maxlength="50" size="22">

              <input type="submit" class="primary-btn text-uppercase" name="Login" value="Login">

              
            </form>
          </div>

        </div>
      </div>
    </section><?php }
}
