{*student_medical_info_form.tpl*}
{load_presentation_object filename="attestation_info" assign="obj"}

{* {load_presentation_object filename="personal_info" assign="obj"} *}

<div class="col-lg-8">
							<form class="form-area contact-form text-right" action="{$obj->mLinkOnTheForm}" method="post">
								<div class="row">

									<div class="col-lg-6 form-group">
										<h2 style="color:#f7631b;"> Attestation</h1><hr>

                                        {if $obj->mAttestationError == 1}
										<span style="color: red;"> Attestation must be checked </span>
										{/if}
										<label for="attestation"><h4 style="color: green;">I Agree to the following</h4></label>

										<hr>

										<input type="checkbox" value="Agree" name="attestation" id="attestation"> I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.

									</div>





									<div class="col-lg-6 form-group">

										<h2 style="color: #f7631b;"> Information</h1>
										<hr>

										<p>
                                            <h6>mLinkToNurseryForm</h6>
                                        </p>
                                        I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.


										<p>
                                            <h6>mLinkToNurseryForm</h6>
                                        </p>
                                        I hereby apply for admission, and agree to abide by the rules and regulations of the school. I also declare that the information supplied above are correct to the best of my knowledge and would be liable for any falsehood detected hereafter.




                                        <br><br>
									</div>
									


									</div> 






                                    <input type="hidden" name="section" value="{$obj->mSection4rmurl}">
									<input type="hidden" name="formPart" value="userattestationinfo">
                                    
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<input type="submit" class="genric-btn primary small" value="Submit Information" name="user_attestation_info">
									</div>
								</div>
							</form>
						</div>