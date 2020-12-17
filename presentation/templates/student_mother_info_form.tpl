{*student_medical_info_form.tpl*}
{load_presentation_object filename="mother_info" assign="obj"}

{* {load_presentation_object filename="personal_info" assign="obj"} *}

<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="{$obj->mLinkOnTheForm}" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Mother's </h1><hr>


										{if $obj->mMothersfirstnameError == 1}
										<span style="color: red;">Enter mother's firstname only</span>
										{/if}
										<label for="mothersfirstname">
											<h6>Mother's Firstname:</h6>
										</label>
										<input name="mothersfirstname" id="mothersfirstname" placeholder="Enter mother first name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mother first name'"
										class="common-input mb-20 form-control" required="" type="text">








										{if $obj->mMotherslastnameError == 1}
										<span style="color: red;"> Enter mother's lastname only</span>
										{/if}
										<label for="motherslastname">
											<h6>Mother's Lastname:</h6>
										</label>
										<input name="motherslastname" id="motherslastname" placeholder="Enter mother last name" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter mother last name'" class="common-input mb-20 form-control" required=""
											type="text">


										




										{if $obj->mMothersphoneError == 1}
										<span style="color: red;"> Enter mother's phone number </span>
										{/if}
										<label for="mothersphone">
											<h6>Mother's Phone number:</h6>
										</label>
										<input name="mothersphone" id="mothersphone" placeholder="Enter mother valid phone number"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mother valid phone number'"
										class="common-input mb-20 form-control" required="" type="text">


										





										{if $obj->mMothersofficeaddressError == 1}
										<span style="color: red;"> Enter mother office address </span>
										{/if}
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

										{if $obj->mMothersoccupationError == 1}
										<span style="color: red;"> Invalid mother occupation </span>
										{/if}
										<label for="mothersoccupation">
											<h6>Mother's Occupation/Profession:</h6>
										</label>
										<input name="mothersoccupation" id="mothersoccupation" placeholder="Enter mother occupation"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mothers occupation'"
										class="common-input mb-20 form-control" required="" type="text">


										
										




										{if $obj->mMothersreligionError == 1}
										<span style="color: red;"> Invalid mother religion </span>
										{/if}
										<label for="mothersreligion">
											<h6>Mother's Religion:</h6>
										</label>
										<input name="mothersreligion" id="mothersreligion" placeholder="Enter mother religion" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter mothers religion'" class="common-input mb-20 form-control" required=""
										type="text">






										{if $obj->mMotherresidentialaddressError == 1}
										<span style="color: red;"> Enter a valid mother residencial address </span>
										{/if}
										<label for="motherresidentialaddress">
											<h6>Mother's Residencial Address:</h6>
										</label>
										<input name="motherresidentialaddress" id="motherresidentialaddress" placeholder="Enter mother residential address"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mothers residential address'"
										class="common-input mb-20 form-control" required="" type="text">



                                        <br><br>
									</div>
									<input type="hidden" name="section" value="{$obj->mSection4rmurl}">
									<input type="hidden" name="formPart" value="usermotherinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_mother_info">
									</div>
								</div>
							</form>
						</div>