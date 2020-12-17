{*student_medical_info_form.tpl*}
{load_presentation_object filename="father_info" assign="obj"}

{* {load_presentation_object filename="personal_info" assign="obj"} *}

<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="{$obj->mLinkOnTheForm}" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Father </h1><hr>


                                        
										{if $obj->mFathersfirstnameError == 1}
										<span style="color: red;"> Enter father firstname only </span>
										{/if}
										<label for="fathersfirstname">
											<h6>Father's Firstname:</h6>
										</label>
										<input name="fathersfirstname" id="fathersfirstname" placeholder="Enter father first name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter father first name'"
										class="common-input mb-20 form-control" required="" type="text">







										{if $obj->mFatherslastnameError == 1}
										<span style="color: red;"> Enter father lastname only</span>
										{/if}
										<label for="fatherslastname">
											<h6>Father's Lastname:</h6>
										</label>
										<input name="fatherslastname" id="fatherslastname" placeholder="Enter father last name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter father last name'"
										class="common-input mb-20 form-control" required="" type="text">








										{if $obj->mFathersphoneError == 1}
										<span style="color: red;"> Enter a value mobile number</span>
										{/if}
										<label for="fathersphone">
											<h6>Father's Phone number:</h6>
										</label>
										<input name="fathersphone" id="fathersphone" placeholder="Enter father valid phone number" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter father valid phone number'" 
										class="common-input mb-20 form-control" 
										required=""
										type="text">








										{if $obj->mFathersofficeaddressError == 1}
										<span style="color: red;"> Enter a traceable valid office address</span>
										{/if}
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

                                        {if $obj->mFathersoccupationError == 1}
										<span style="color: red;"> Invalid occupation</span>
										{/if}
										<label for="fathersoccupation">
											<h6>Father's Occupation/Profession:</h6>
										</label>
										<input name="fathersoccupation" id="fathersoccupation" placeholder="Enter father occupation"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter fathers occupation'"
										class="common-input mb-20 form-control" required="" type="text">








										{if $obj->mFathersreligionError == 1}
										<span style="color: red;"> Enter a valid religion</span>
										{/if}
										<label for="fathersreligion">
											<h6>Father's Religion:</h6>
										</label>
										<input name="fathersreligion" id="fathersreligion" placeholder="Enter father religion"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter fathers religion'"
											class="common-input mb-20 form-control" required="" type="text">








										{if $obj->mFatherresidentialaddressError == 1}
										<span style="color: red;"> Enter a valid, traceable residencial address</span>
										{/if}
										<label for="fatherresidentialaddress">
											<h6>Father's Residencial Address:</h6>
										</label>
										<input name="fatherresidentialaddress" id="fatherresidentialaddress" placeholder="Enter father residential address" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter fathers residential address'" class="common-input mb-20 form-control" required="" type="text">
										
										<br>





									</div>
									<input type="hidden" name="section" value="{$obj->mSection4rmurl}">
									<input type="hidden" name="formPart" value="userfatherinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_father_info">
									</div>
								</div>
							</form>
						</div>