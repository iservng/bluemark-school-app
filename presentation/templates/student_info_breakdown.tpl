
			<!-- Start course-details Area -->
			{* <section class="course-details-area pt-120">
				<div class="container">
					<div class="row"> *}



						<div class="col-lg-8 left-contents">
							<div class="main-image">
								
								<h3> My profile details</h3>
								{if $obj->mErrorMsg}
									<span style="color: red;"> ERROR: {$obj->mErrorMsg}</span>
								{/if}
									
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
														{$obj->mBloodgroup}
													</span>
	                                			</div>

	                                			<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Genotype</span>
	                                				<span>
													{$obj->mGenotype}
													</span>
	                                			</div>

	                                			<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Allergies</span>
	                                				<span>{$obj->mAllergies}</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Defects</span>
	                                				<span>{$obj->mDefects}</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Immunize</span>
	                                				<span>{$obj->mImmunize}</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Name</span>
	                                				<span>Dr. {$obj->mDocname}</span>
	                                			</div>

												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Phone</span>
	                                				<span>{$obj->mDocphone}</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star checked"></i>
	                                				<span>Doctor's Address</span>
	                                				<span>{$obj->mDocaddress}</span>
	                                			</div>
												<div class="d-flex flex-row reviews">
												<i class="fa fa-star"></i>
	                                				<span>Other Information</span>
	                                				<span>{$obj->mOtherinfo}</span>
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
						                                    	{$obj->mFatherFname}
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
						                                    	{$obj->mFatherLname}
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
						                                    	{$obj->mFatherPhone}
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
						                                    	{$obj->mFatherOccupation}
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
						                                    	{$obj->mFatherOfficeAddress}
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
						                                    	{$obj->mFatherAddress}
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
						                                    	{$obj->mMotherFname}
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
						                                    	{$obj->mMotherLname}
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
						                                    	{$obj->mMotherPhone}
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
						                                    	{$obj->mMotherOccupation}
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
						                                    	{$obj->mMotherOfficeAddress}
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
						                                    	{$obj->mMotherAddress}
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
						                    <form method="post" action="{$obj->mLinkToStudentProfile}">
						                       
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
								{if $obj->mReportCardLinksCount > 0}
								
								{section name=i loop=$obj->mReportCardLinks}
									<li>
										<a class="justify-content-between d-flex" target="_blank" href="{$obj->mReportCardLinks[i][0]}">
											<p>{$obj->mReportCardLinks[i][2]}</p> 
											<span class="or">{$obj->mReportCardLinks[i][1]}</span>
										</a>
										
									</li>
								{/section}

{* 
									<li>
										<a class="justify-content-between d-flex" href="#">
											<p>Course Fee </p>
											<span>$230</span>
										</a>
									</li>
									<li>
										<a class="justify-content-between d-flex" href="#">
											<p>Available Seats </p>
											<span>15</span>
										</a>
									</li>
									<li>
										<a class="justify-content-between d-flex" href="#">
											<p>Schedule </p>
											<span>2.00 pm to 4.00 pm</span>
										</a>
									</li> *}
								{else}
									<li>
										
											<p style="color: #f7631b;"> Report Cards not available </p>
											
										
									</li>
								{/if}
							</ul>
							
						</div>

						{*
					</div>
				</div>	
			</section> *}
			<!-- End course-details Area -->