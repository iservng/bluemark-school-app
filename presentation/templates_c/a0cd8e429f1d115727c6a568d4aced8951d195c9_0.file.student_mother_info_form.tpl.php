<?php
/* Smarty version 3.1.33, created on 2020-03-29 18:41:32
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_mother_info_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e80ddcc815c42_76315762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0cd8e429f1d115727c6a568d4aced8951d195c9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_mother_info_form.tpl',
      1 => 1585501488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80ddcc815c42_76315762 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"mother_info",'assign'=>"obj"),$_smarty_tpl);?>



<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkOnTheForm;?>
" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Mother's </h1><hr>


										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMothersfirstnameError == 1) {?>
										<span style="color: red;">Enter mother's firstname only</span>
										<?php }?>
										<label for="mothersfirstname">
											<h6>Mother's Firstname:</h6>
										</label>
										<input name="mothersfirstname" id="mothersfirstname" placeholder="Enter mother first name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mother first name'"
										class="common-input mb-20 form-control" required="" type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMotherslastnameError == 1) {?>
										<span style="color: red;"> Enter mother's lastname only</span>
										<?php }?>
										<label for="motherslastname">
											<h6>Mother's Lastname:</h6>
										</label>
										<input name="motherslastname" id="motherslastname" placeholder="Enter mother last name" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter mother last name'" class="common-input mb-20 form-control" required=""
											type="text">


										




										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMothersphoneError == 1) {?>
										<span style="color: red;"> Enter mother's phone number </span>
										<?php }?>
										<label for="mothersphone">
											<h6>Mother's Phone number:</h6>
										</label>
										<input name="mothersphone" id="mothersphone" placeholder="Enter mother valid phone number"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mother valid phone number'"
										class="common-input mb-20 form-control" required="" type="text">


										





										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMothersofficeaddressError == 1) {?>
										<span style="color: red;"> Enter mother office address </span>
										<?php }?>
										<label for="mothersofficeaddress">
											<h6>Mother's Office Address:</h6>
										</label>
										<input name="mothersofficeaddress" id="mothersofficeaddress" placeholder="Enter mother office address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mother office address'"
										class="common-input mb-20 form-control" required="" type="text">


									</div> 

















									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>

										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMothersoccupationError == 1) {?>
										<span style="color: red;"> Invalid mother occupation </span>
										<?php }?>
										<label for="mothersoccupation">
											<h6>Mother's Occupation/Profession:</h6>
										</label>
										<input name="mothersoccupation" id="mothersoccupation" placeholder="Enter mother occupation"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mothers occupation'"
										class="common-input mb-20 form-control" required="" type="text">


										
										




										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMothersreligionError == 1) {?>
										<span style="color: red;"> Invalid mother religion </span>
										<?php }?>
										<label for="mothersreligion">
											<h6>Mother's Religion:</h6>
										</label>
										<input name="mothersreligion" id="mothersreligion" placeholder="Enter mother religion" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter mothers religion'" class="common-input mb-20 form-control" required=""
										type="text">






										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMotherresidentialaddressError == 1) {?>
										<span style="color: red;"> Enter a valid mother residencial address </span>
										<?php }?>
										<label for="motherresidentialaddress">
											<h6>Mother's Residencial Address:</h6>
										</label>
										<input name="motherresidentialaddress" id="motherresidentialaddress" placeholder="Enter mother residential address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mothers residential address'"
										class="common-input mb-20 form-control" required="" type="text">



                                        <br><br>
									</div>
									<input type="hidden" name="section" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection4rmurl;?>
">
									<input type="hidden" name="formPart" value="usermotherinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_mother_info">
									</div>
								</div>
							</form>
						</div><?php }
}
