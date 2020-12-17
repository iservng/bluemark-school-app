{*student_medical_info_form.tpl*}
{load_presentation_object filename="medical_info" assign="obj"}

{* {load_presentation_object filename="personal_info" assign="obj"} *}

<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="{$obj->mLinkOnTheForm}" method="post" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Medical </h1><hr>



                                        {if $obj->mBloodgroupError == 1}
										<span style="color: red;"> Invalid blood group </span>
										{/if}
										<label for="bloodgroup"><h6>Blood Group:</h6></label>

										<input name="bloodgroup" id="bloodgroup" placeholder="Enter your blood group" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your blood group'" class="common-input mb-20 form-control" required="" type="text">

                                        {if $obj->mGenotypeError == 1}
										<span style="color: red;"> Invalid genotype </span>
										{/if}
										<label for="genotype">
											<h6>Genotype:</h6>
										</label>
										<input name="genotype" id="genotype" 
										placeholder="Enter genotype" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter genotype'" class="common-input mb-20 form-control" 
										required="" 
										type="text">






										{if $obj->mAllergiesError == 1}
										<span style="color: red;"> Invalid allergies </span>
										{/if}
										<label for="allergies">
											<h6>Allergies:</h6>
										</label>
										<input name="allergies" id="allergies" placeholder="Enter allergies" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter allergies'" class="common-input mb-20 form-control" 
										required="" 
										type="text">

                                        

										{if $obj->mDefectsError == 1}
										<span style="color: red;"> Invalid defects </span>
										{/if}
										<label for="defects">
											<h6>Defects:</h6>
										</label>
										<input name="defects" id="defects" 
										placeholder="Specify defects" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Specify defects'" class="common-input mb-20 form-control" 
										required="" 
										type="text">



										{if $obj->mDocReportError == 1}
										<span style="color: red;"> Use png or jpg file less than 85kb</span>
										{/if}
										<label for="doctorsreport">
											<h6>Doctors Report:</h6>
										</label>
										<input name="doctorsreport" id="doctorsreport" class="common-input mb-20 form-control" required="" type="file">
										

									</div>

















									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>


                                        {if $obj->mImmunizedError == 1}
										<span style="color: red;"> Invalid immunization data </span>
										{/if}
										<label for="immunized">
											<h6>Immunized?:</h6>
										</label>
										<input name="immunized" id="immunized" placeholder="Specify the immunization recieved" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Specify the immunization recieved  '" 
										class="common-input mb-20 form-control" 
										required=""
										type="text">



                                        {if $obj->mDoctorsnameError == 1}
										<span style="color: red;"> Enter the doctor's firstname only </span>
										{/if}
										<label for="doctorsname">
											<h6>Name of family Doctor:</h6>
										</label>
										<input name="doctorsname" id="doctorsname" placeholder="Specify the doctor's name" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Specify the doctors name  '" class="common-input mb-20 form-control" required=""
										type="text">





                                        
										{if $obj->mDoctorsphoneError == 1}
										<span style="color: red;"> Emter a valid mobile number </span>
										{/if}
										<label for="doctorsphone">
											<h6>Doctor Phone:</h6>
										</label>
										<input name="doctorsphone" id="doctorsphone" placeholder="Enter doctor's phone number" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter the doctors phone number'" class="common-input mb-20 form-control" required=""
											type="text">








										{if $obj->mDoctorsaddressError == 1}
										<span style="color: red;"> Enter a valid traceable Office address </span>
										{/if}
										<label for="doctorsaddress">
											<h6>Family Doctor's Office Address:</h6>
										</label>
										<input name="doctorsaddress" id="doctorsaddress" placeholder="Specify the doctor's address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Specify the doctors address'"
										class="common-input mb-20 form-control" 
										required="" type="text">



                                        {if $obj->mOthermedicalinfoError == 1}

										<span style="color: red;"> Invalid field data </span>

										{/if}
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
									<input type="hidden" name="section" value="{$obj->mSection4rmurl}">
									<input type="hidden" name="formPart" value="usermedicalinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_medical_info">
									</div>
								</div>
							</form>
						</div>