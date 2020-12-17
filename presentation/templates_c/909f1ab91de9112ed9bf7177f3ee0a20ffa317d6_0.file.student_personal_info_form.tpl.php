<?php
/* Smarty version 3.1.33, created on 2020-10-11 07:45:51
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_personal_info_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f829c0fd482b2_07485323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '909f1ab91de9112ed9bf7177f3ee0a20ffa317d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_personal_info_form.tpl',
      1 => 1602395143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f829c0fd482b2_07485323 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"personal_info",'assign'=>"obj"),$_smarty_tpl);?>


<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkOnTheForm;?>
" method="post" enctype="multipart/form-data">
								<div class="row">
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDuplicateErrorMsg) {?>
										<h2 style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDuplicateErrorMsg;?>
 </h1><hr>
									<?php }?>
									<div class="col-lg-6 form-group">
									
										<h2 style="color:#f7631b;"> Personal </h1><hr>



										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFirstnameError == 1) {?>
										<span style="color: red;"> Firstname is invalid</span>
										<?php }?>
										<label for="firstname">
											<h6>Firstname:</h6>
										</label>
										<input name="firstname" 
										id="firstname" 
										placeholder="Enter your firstname" 
										onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter your firstname'" class="common-input mb-20 form-control" 
										required="" 
										type="text">
										



										



										







										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mSurnameError == 1) {?>
										<span style="color: red;">Invalid surname</span>
										<?php }?>
										<label for="surname"><h6>Surname:</h6></label>
										<input name="surname" id="surname" placeholder="Enter your surname" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter your surname'" class="common-input mb-20 form-control" required="" type="text">


										


										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mOthernameError == 1) {?>
										<span style="color: red;">Invalid other-name</span>
										<?php }?>
										<label for="othername"><h6>Othername:</h6></label>
										<input name="othername" id="othername" placeholder="Enter your othername" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your othername'" class="common-input mb-20 form-control" required="" type="text">







										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPasswordError == 1) {?>
										<span style="color: red;">Password must be at least 8 (alphanumerics) characters </span>
										<?php }?>
										<label for="password"><h6>Password:</h6></label>
										<input name="password" id="password" placeholder="Enter your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" class="common-input mb-20 form-control" required="" type="password">






										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmPasswordError == 1) {?>
										<span style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmPasswordErrorMessage;?>
 </span>
										<?php }?>
										<label for="confirmPassword"><h6>Confirm Password:</h6></label>
										<input name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Re-enter your password'" class="common-input mb-20 form-control" required="" type="password">


										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowPrimaryCert) {?>

											<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimarycertificateError == 1) {?>
												<span style="color: red;">Use jpg/png file, size less than 90kb </span>
											<?php }?>
											<label for="primarycertificate">
												<h6>Primary Certificate:</h6>
											</label>
											<input name="primarycertificate" id="primarycertificate" class="common-input mb-20 form-control" 
											required type="file">

										<?php }?>



									</div>
















									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>


										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmailError == 1) {?>
										<span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmailMessage;?>
</span>
										<?php }?>
										<label for="email"><h6>Email Address:</h6></label>
										<input name="email" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">





										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPassportError == 1) {?>
										<span style="color: red;">Use png or jpg file type only</span>
										<?php }?>
										<label for="passport"><h6>Select Passport:</h6></label>
										<input name="passport" id="passport" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="file">




										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mBirthcertificateError == 1) {?>
										<span style="color: red;"> Use png/jpg file only or check file size </span>
										<?php }?>
										<label for="birthcertificate">
											<h6>Birth Certificate:</h6>
										</label>
										<input name="birthcertificate" id="birthcertificate" placeholder="Enter subject" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" 
										required="" type="file">




										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mGenderError == 1) {?>
										<span style="color: red;"> Invalid gender </span>
										<?php }?>
										<label for="gender"><h6> Gender:</h6></label>
										<input name="gender" id="gender" placeholder="Enter gender" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter gender'" class="common-input mb-20 form-control" required="" type="text">

										






										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStateoforiginError == 1) {?>
										<span style="color: red;"> State must be one word [eg -> Kano] </span>
										<?php }?>
										<label for="stateoforigin"><h6>State of Origin:</h6></label>
										<input name="stateoforigin" id="stateoforigin" 
										placeholder="Enter state of origin" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" 
										required="" 
										type="text">



										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDateofbirthError == 1) {?>
										<span style="color: red;"> Invalid date of birth </span>
										<?php }?>
										<label for="dateofbirth"><h6>Date of Birth:</h6></label>
										<input name="dateofbirth" id="dateofbirth" placeholder="Enter your date of birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="date">







									</div>
									<input type="hidden" name="section" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection4rmurl;?>
">
									<input type="hidden" name="formPart" value="userpersonalinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_personal_info">
									</div>
								</div>
							</form>
						</div><?php }
}
