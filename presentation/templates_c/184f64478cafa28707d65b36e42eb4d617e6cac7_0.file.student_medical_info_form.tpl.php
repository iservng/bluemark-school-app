<?php
/* Smarty version 3.1.33, created on 2020-03-29 18:38:22
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_medical_info_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e80dd0e1b3d93_11282473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '184f64478cafa28707d65b36e42eb4d617e6cac7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_medical_info_form.tpl',
      1 => 1585502911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e80dd0e1b3d93_11282473 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"medical_info",'assign'=>"obj"),$_smarty_tpl);?>



<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkOnTheForm;?>
" method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Medical </h1><hr>



                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mBloodgroupError == 1) {?>
										<span style="color: red;"> Invalid blood group </span>
										<?php }?>
										<label for="bloodgroup"><h6>Blood Group:</h6></label>

										<input name="bloodgroup" id="bloodgroup" placeholder="Enter your blood group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your blood group'" class="common-input mb-20 form-control" required="" type="text">

                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mGenotypeError == 1) {?>
										<span style="color: red;"> Invalid genotype </span>
										<?php }?>
										<label for="genotype">
											<h6>Genotype:</h6>
										</label>
										<input name="genotype" id="genotype" 
										placeholder="Enter genotype" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter genotype'" class="common-input mb-20 form-control" 
										required="" 
										type="text">






										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllergiesError == 1) {?>
										<span style="color: red;"> Invalid allergies </span>
										<?php }?>
										<label for="allergies">
											<h6>Allergies:</h6>
										</label>
										<input name="allergies" id="allergies" placeholder="Enter allergies" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter allergies'" class="common-input mb-20 form-control" 
										required="" 
										type="text">

                                        

										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDefectsError == 1) {?>
										<span style="color: red;"> Invalid defects </span>
										<?php }?>
										<label for="defects">
											<h6>Defects:</h6>
										</label>
										<input name="defects" id="defects" 
										placeholder="Specify defects" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Specify defects'" class="common-input mb-20 form-control" 
										required="" 
										type="text">



										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDocReportError == 1) {?>
										<span style="color: red;"> Use png or jpg file less than 85kb</span>
										<?php }?>
										<label for="doctorsreport">
											<h6>Doctors Report:</h6>
										</label>
										<input name="doctorsreport" id="doctorsreport" class="common-input mb-20 form-control" required="" type="file">
										

									</div>

















									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>


                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mImmunizedError == 1) {?>
										<span style="color: red;"> Invalid immunization data </span>
										<?php }?>
										<label for="immunized">
											<h6>Immunized?:</h6>
										</label>
										<input name="immunized" id="immunized" placeholder="Specify the immunization recieved" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Specify the immunization recieved  '" 
										class="common-input mb-20 form-control" 
										required=""
										type="text">



                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDoctorsnameError == 1) {?>
										<span style="color: red;"> Enter the doctor's firstname only </span>
										<?php }?>
										<label for="doctorsname">
											<h6>Name of family Doctor:</h6>
										</label>
										<input name="doctorsname" id="doctorsname" placeholder="Specify the doctor's name" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Specify the doctors name  '" class="common-input mb-20 form-control" required=""
										type="text">





                                        
										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDoctorsphoneError == 1) {?>
										<span style="color: red;"> Emter a valid mobile number </span>
										<?php }?>
										<label for="doctorsphone">
											<h6>Doctor Phone:</h6>
										</label>
										<input name="doctorsphone" id="doctorsphone" placeholder="Enter doctor's phone number" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter the doctors phone number'" class="common-input mb-20 form-control" required=""
											type="text">








										<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDoctorsaddressError == 1) {?>
										<span style="color: red;"> Enter a valid traceable Office address </span>
										<?php }?>
										<label for="doctorsaddress">
											<h6>Family Doctor's Office Address:</h6>
										</label>
										<input name="doctorsaddress" id="doctorsaddress" placeholder="Specify the doctor's address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Specify the doctors address'"
										class="common-input mb-20 form-control" 
										required="" type="text">



                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mOthermedicalinfoError == 1) {?>

										<span style="color: red;"> Invalid field data </span>

										<?php }?>
										<label for="othermedicalinfo">
											<h6>Any other medical information?:</h6>
										</label>
										<textarea 
										class="common-textarea form-control" id="othermedicalinfo" name="othermedicalinfo" 
										placeholder="Specify any other medical information that might relivant" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Specify any other medical information that might relivant'" 
										required=""></textarea><br><br>



									</div>
									<input type="hidden" name="section" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection4rmurl;?>
">
									<input type="hidden" name="formPart" value="usermedicalinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_medical_info">
									</div>
								</div>
							</form>
						</div><?php }
}
