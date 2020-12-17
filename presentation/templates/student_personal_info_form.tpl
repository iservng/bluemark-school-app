{load_presentation_object filename="personal_info" assign="obj"}

<div class="col-lg-8">
							<form class="form-area contact-form text-right" id="" action="{$obj->mLinkOnTheForm}" method="post" enctype="multipart/form-data">
								<div class="row">
{if $obj->mDuplicateErrorMsg}
										<h2 style="color: red;"> {$obj->mDuplicateErrorMsg} </h1><hr>
									{/if}
									<div class="col-lg-6 form-group">
									
										<h2 style="color:#f7631b;"> Personal </h1><hr>



										{if $obj->mFirstnameError == 1}
										<span style="color: red;"> Firstname is invalid</span>
										{/if}
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
										



										



										







										{if $obj->mSurnameError == 1}
										<span style="color: red;">Invalid surname</span>
										{/if}
										<label for="surname"><h6>Surname:</h6></label>
										<input name="surname" id="surname" placeholder="Enter your surname" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter your surname'" class="common-input mb-20 form-control" required="" type="text">


										


										{if $obj->mOthernameError == 1}
										<span style="color: red;">Invalid other-name</span>
										{/if}
										<label for="othername"><h6>Othername:</h6></label>
										<input name="othername" id="othername" placeholder="Enter your othername" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your othername'" class="common-input mb-20 form-control" required="" type="text">







										{if $obj->mPasswordError == 1}
										<span style="color: red;">Password must be at least 8 (alphanumerics) characters </span>
										{/if}
										<label for="password"><h6>Password:</h6></label>
										<input name="password" id="password" placeholder="Enter your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" class="common-input mb-20 form-control" required="" type="password">






										{if $obj->mConfirmPasswordError == 1}
										<span style="color: red;"> {$obj->mConfirmPasswordErrorMessage} </span>
										{/if}
										<label for="confirmPassword"><h6>Confirm Password:</h6></label>
										<input name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Re-enter your password'" class="common-input mb-20 form-control" required="" type="password">


										{if $obj->mShowPrimaryCert}

											{if $obj->mPrimarycertificateError == 1}
												<span style="color: red;">Use jpg/png file, size less than 90kb </span>
											{/if}
											<label for="primarycertificate">
												<h6>Primary Certificate:</h6>
											</label>
											<input name="primarycertificate" id="primarycertificate" class="common-input mb-20 form-control" 
											required type="file">

										{/if}



									</div>







{* SelectedSection *}









									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>


										{if $obj->mEmailError == 1}
										<span style="color: red;">{$obj->mEmailMessage}</span>
										{/if}
										<label for="email"><h6>Email Address:</h6></label>
										<input name="email" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">





										{if $obj->mPassportError == 1}
										<span style="color: red;">Use png or jpg file type only</span>
										{/if}
										<label for="passport"><h6>Select Passport:</h6></label>
										<input name="passport" id="passport" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="file">




										{if $obj->mBirthcertificateError == 1}
										<span style="color: red;"> Use png/jpg file only or check file size </span>
										{/if}
										<label for="birthcertificate">
											<h6>Birth Certificate:</h6>
										</label>
										<input name="birthcertificate" id="birthcertificate" placeholder="Enter subject" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" 
										required="" type="file">




										{if $obj->mGenderError == 1}
										<span style="color: red;"> Invalid gender </span>
										{/if}
										<label for="gender"><h6> Gender:</h6></label>
										<input name="gender" id="gender" placeholder="Enter gender" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter gender'" class="common-input mb-20 form-control" required="" type="text">

										






										{if $obj->mStateoforiginError == 1}
										<span style="color: red;"> State must be one word [eg -> Kano] </span>
										{/if}
										<label for="stateoforigin"><h6>State of Origin:</h6></label>
										<input name="stateoforigin" id="stateoforigin" 
										placeholder="Enter state of origin" 
										onfocus="this.placeholder = ''" 
										onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" 
										required="" 
										type="text">



										{if $obj->mDateofbirthError == 1}
										<span style="color: red;"> Invalid date of birth </span>
										{/if}
										<label for="dateofbirth"><h6>Date of Birth:</h6></label>
										<input name="dateofbirth" id="dateofbirth" placeholder="Enter your date of birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="date">







									</div>
									<input type="hidden" name="section" value="{$obj->mSection4rmurl}">
									<input type="hidden" name="formPart" value="userpersonalinfo">
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Send Information" name="user_personal_info">
									</div>
								</div>
							</form>
						</div>