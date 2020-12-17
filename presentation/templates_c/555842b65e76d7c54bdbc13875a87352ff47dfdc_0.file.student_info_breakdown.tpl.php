<?php
/* Smarty version 3.1.33, created on 2020-11-02 12:27:43
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_info_breakdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f9fed2f3aabc6_37595191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '555842b65e76d7c54bdbc13875a87352ff47dfdc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_info_breakdown.tpl',
      1 => 1604315458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9fed2f3aabc6_37595191 (Smarty_Internal_Template $_smarty_tpl) {
?>
			<!-- Start course-details Area -->
			


						<div class="col-lg-8 left-contents">
							<div class="main-image">
								
								<h3> My profile details</h3>
								<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMsg) {?>
									<span style="color: red;"> ERROR: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMsg;?>
</span>
								<?php }?>
									
								<hr>
							</div>
							<div class="jq-tab-wrapper" id="horizontalTab">
	                            <div class="jq-tab-menu">
	                                <div class="jq-tab-title active" data-tab="1">Medicals</div>
	                                <div class="jq-tab-title" data-tab="2">Father</div>
	                                <div class="jq-tab-title" data-tab="3">Mother</div>
	                                <div class="jq-tab-title" data-tab="4">Comments</div>
	                                <div class="jq-tab-title" data-tab="5">Edit Profile</div>
	                            </div>
	                            <div class="jq-tab-content-wrapper">
	                                <div class="jq-tab-content active" data-tab="1">
										<div class="review-top row pt-40">
	                                		<div class="col-lg-3">
	                                			<div class="avg-review">
	                                				Medical <br>
	                                				<span>5.0</span> <br>
	                                				(Information)
	                                			</div>
	                                		</div>
	                                		<div class="col-lg-9">
											
	                                			<h4 class="mb-20">Your Medical Information Details</h4>
	                                			<div class="d-flex flex-row reviews">
														<i class="fa fa-star checked"></i>
	                                				<span>Bloodgroup</span>
	                                				<span>
														<?php echo $_smarty_tpl->tpl_vars['obj']->value->mBloodgroup;?>

													</span>
	                                			</div>

	                                			<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Genotype</span>
	                                				<span>
													<?php echo $_smarty_tpl->tpl_vars['obj']->value->mGenotype;?>

													</span>
	                                			</div>

	                                			<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Allergies</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllergies;?>
</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Defects</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDefects;?>
</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Immunize</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mImmunize;?>
</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Name</span>
	                                				<span>Dr. <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDocname;?>
</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Phone</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDocphone;?>
</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Address</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDocaddress;?>
</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star"></i>
	                                				<span>Other Information</span>
	                                				<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOtherinfo;?>
</span>
	                                			</div>
	                                		</div>
	                                	</div>
	                                </div>

	                                <div class="jq-tab-content" data-tab="2">
									
	                                     <div class="comments-area mb-30">
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c1.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">First Name</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherFname;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c2.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Last Name</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherLname;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>   
											<div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c3.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Phone</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherPhone;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c3.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Occupation</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherOccupation;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c4.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Office Address</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherOfficeAddress;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
											<div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c4.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Residential Address</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFatherAddress;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div> 						                                                                      
						                </div>
	                                </div>

	                                <div class="jq-tab-content" data-tab="3">
										<div class="comments-area mb-30">
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c1.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">First Name</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherFname;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c2.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Last Name</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherLname;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>   
											<div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c3.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Phone</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherPhone;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c3.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Occupation</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherOccupation;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c4.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Office Address</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherOfficeAddress;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
											<div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c4.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Residential Address</a></h5>
						                                    <p class="comment">
						                                    	<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMotherAddress;?>

						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div> 						                                                                      
						                </div>
	                                </div>

	                                <div class="jq-tab-content comment-wrap" data-tab="4">
						           
						                <div class="comment-form">
						                    <h4>Customize your profile content</h4>
						                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
">
						                       
						                        <div class="form-group">
						                            <input type="text" name="title" class="form-control" id="subject" placeholder="Profile title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
						                        </div>
						                        <div class="form-group">
						                            <textarea class="form-control mb-10" rows="5" name="goals" placeholder="Your goals" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						                        </div>
												<div class="form-group">
						                            <textarea class="form-control mb-10" rows="5" name="objectives" placeholder="Your objectives" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						                        </div>
												<div class="form-group">
						                            <textarea class="form-control mb-10" rows="5" name="about_yourself" placeholder="Tell about yourself" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						                        </div>
												
						                        <input type="submit" name="edit_profile_info" class="mt-40 text-uppercase genric-btn primary text-center">
						                    </form>
						                </div>     						                
	                                </div>
	                                <div class="jq-tab-content" data-tab="5">


	                                	<div class="review-top row pt-40">
	                                		<div class="col-lg-3">
	                                			<div class="avg-review">
	                                				Average <br>
	                                				<span>5.0</span> <br>
	                                				(3 Ratings)
	                                			</div>
	                                		</div>
	                                		<div class="col-lg-9">
	                                			<h4 class="mb-20">Provide Your Rating</h4>
	                                			<div class="d-flex flex-row reviews">
	                                				<span>Quality</span>
													<div class="star">
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
	                                				<span>Outstanding</span>
	                                			</div>
	                                			<div class="d-flex flex-row reviews">
	                                				<span>Puncuality</span>
													<div class="star">
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
	                                				<span>Outstanding</span>
	                                			</div>
	                                			<div class="d-flex flex-row reviews">
	                                				<span>Quality</span>
													<div class="star">
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star checked"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
	                                				<span>Outstanding</span>
	                                			</div>
	                                		</div>
	                                	</div>
	                                	<div class="feedeback">
	                                		<h4 class="pb-20">Your Feedback</h4>
	                                		<textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
	                                		<a href="#" class="mt-20 primary-btn text-right text-uppercase">Submit</a>
	                                	</div>

										---------
						                <div class="comments-area mb-30">
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c1.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Emilly Blunt</a>
															<div class="star">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
															</div>
						                                    </h5>
						                                    <p class="comment">
						                                    	ass Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c2.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Elsie Cunningham</a>
															<div class="star">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
															</div>
						                                    </h5>
						                                    <p class="comment">
						                                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>   
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c3.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Maria Luna</a>
															<div class="star">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
															</div>
						                                    </h5>
						                                    <p class="comment">
						                                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  
						                    <div class="comment-list">
						                        <div class="single-comment single-reviews justify-content-between d-flex">
						                            <div class="user justify-content-between d-flex">
						                                <div class="thumb">
						                                    <img src="img/blog/c4.jpg" alt="">
						                                </div>
						                                <div class="desc">
						                                    <h5><a href="#">Maria Luna</a>
															<div class="star">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
															</div>
						                                    </h5>
						                                    <p class="comment">
						                                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
						                                    </p>
						                                </div>
						                            </div>
						                        </div>
						                    </div>  						                                                                      
						                </div>	



	                                </div>                                
	                            </div>
	                        </div>
						</div>



						 <div class="col-lg-4 right-contents">
						 <a href="#" class="primary-btn text-uppercase">Termly Results Panel</a>
							<ul>
								<?php if ($_smarty_tpl->tpl_vars['obj']->value->mReportCardLinksCount > 0) {?>
								
								<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mReportCardLinks) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<li>
										<a class="justify-content-between d-flex" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mReportCardLinks[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][0];?>
">
											<p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mReportCardLinks[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][2];?>
</p> 
											<span class="or"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mReportCardLinks[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)][1];?>
</span>
										</a>
										
									</li>
								<?php
}
}
?>

								<?php } else { ?>
									<li>
										
											<p style="color: #f7631b;"> Report Cards not available </p>
											
										
									</li>
								<?php }?>
							</ul>
							
						</div>

									<!-- End course-details Area --><?php }
}
