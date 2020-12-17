<?php
/* Smarty version 3.1.33, created on 2020-03-29 18:40:05
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_father_info_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e80dd75797a45_64317493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '992f748e71e8acf6b0c41a10dfe993cde884615f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_father_info_form.tpl',
      1 => 1585501797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80dd75797a45_64317493 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"father_info",'assign'=>"obj"),$_smarty_tpl);?>



<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkOnTheForm;?>
" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Father </h1><hr>


                                        
										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFathersfirstnameError == 1) {?>
										<span style="color: red;"> Enter father firstname only </span>
										<?php }?>
										<label for="fathersfirstname">
											<h6>Father's Firstname:</h6>
										</label>
										<input name="fathersfirstname" id="fathersfirstname" placeholder="Enter father first name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter father first name'"
										class="common-input mb-20 form-control" required="" type="text">







										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFatherslastnameError == 1) {?>
										<span style="color: red;"> Enter father lastname only</span>
										<?php }?>
										<label for="fatherslastname">
											<h6>Father's Lastname:</h6>
										</label>
										<input name="fatherslastname" id="fatherslastname" placeholder="Enter father last name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter father last name'"
										class="common-input mb-20 form-control" required="" type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFathersphoneError == 1) {?>
										<span style="color: red;"> Enter a value mobile number</span>
										<?php }?>
										<label for="fathersphone">
											<h6>Father's Phone number:</h6>
										</label>
										<input name="fathersphone" id="fathersphone" placeholder="Enter father valid phone number" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter father valid phone number'" 
										class="common-input mb-20 form-control" 
										required=""
										type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFathersofficeaddressError == 1) {?>
										<span style="color: red;"> Enter a traceable valid office address</span>
										<?php }?>
										<label for="fathersofficeaddress">
											<h6>Father's Office Address:</h6>
										</label>
										<input name="fathersofficeaddress" id="fathersofficeaddress" placeholder="Enter father office address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter father office address'"
										class="common-input mb-20 form-control" required="" type="text">


									</div>

















									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>

                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mFathersoccupationError == 1) {?>
										<span style="color: red;"> Invalid occupation</span>
										<?php }?>
										<label for="fathersoccupation">
											<h6>Father's Occupation/Profession:</h6>
										</label>
										<input name="fathersoccupation" id="fathersoccupation" placeholder="Enter father occupation"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter fathers occupation'"
										class="common-input mb-20 form-control" required="" type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFathersreligionError == 1) {?>
										<span style="color: red;"> Enter a valid religion</span>
										<?php }?>
										<label for="fathersreligion">
											<h6>Father's Religion:</h6>
										</label>
										<input name="fathersreligion" id="fathersreligion" placeholder="Enter father religion"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter fathers religion'"
											class="common-input mb-20 form-control" required="" type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFatherresidentialaddressError == 1) {?>
										<span style="color: red;"> Enter a valid, traceable residencial address</span>
										<?php }?>
										<label for="fatherresidentialaddress">
											<h6>Father's Residencial Address:</h6>
										</label>
										<input name="fatherresidentialaddress" id="fatherresidentialaddress" placeholder="Enter father residential address" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter fathers residential address'" class="common-input mb-20 form-control" required="" type="text">
										
										<br>





									</div>
									<input type="hidden" name="section" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection4rmurl;?>
">
									<input type="hidden" name="formPart" value="userfatherinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_father_info">
									</div>
								</div>
							</form>
						</div><?php }
}
