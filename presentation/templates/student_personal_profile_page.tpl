{*checkout_info.tpl*}
{load_presentation_object filename="studentuser_profile" assign="obj"}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				{$obj->mProfilePageTitle} 
			</h1>	
			<p class="text-white link-nav">
				<h5 style="color: white;"> Welcome to your profile page 
                </h5>  
				{* <span class="lnr lnr-arrow-right"></span>   *}
				{* <a href="events.html"> </a> *}
			</p> 
		 </div>	
	</div>
</div>
</section>




	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<!-- <img class="img-fluid" src="img/blog/feature-img1.jpg" alt=""> -->
							</div>
						</div>
						<div class="col-lg-3  col-md-3 meta-details">
							<ul class="tags">
								<li><a href="#">Food,</a></li>
								<li><a href="#">Technology,</a></li>
								<li><a href="#">Politics,</a></li>
								<li><a href="#">Lifestyle</a></li>
							</ul>
							<div class="user-details row">

								{if $obj->mIsCustomerStudentValid == 0}
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">School Fees</a> <span
										class="lnr lnr-user"></span></p>
								{/if}

								<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span
										class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span
										class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span
										class="lnr lnr-bubble"></span></p>
								<ul class="social-links col-lg-12 col-md-12 col-6">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
									<li><a href="#"><i class="fa fa-behance"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<h3 class="mt-20 mb-20">
							{if $obj->mCongratMsg}
                                {$obj->mCongratMsg}
							{/if}
                            </h3>
							<p class="excert">
								{$obj->mNormalParagraph1}
							</p>
							<p class="excert">
								{$obj->mNormalParagraph2}
								
							</p>
                            <p> 
                            {if $obj->mIsCustomerStudentValid == 2}
                                <a href="" class="genric-btn primary small">I Accept Admission </a>
							{/if}
                                <a href="" class="genric-btn success small">Print Admission Letter</a>
                            </p>
							
						</div>
						<!--  -->
					</div>

					<div class="comment-form"></div>

					
					<div class="comment-form">
						<h4>Leave a Comment</h4>
						<form>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-12 name">
									<input type="text" class="form-control" id="name" placeholder="Enter Name"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" style="border: 1px solid #f7631b;">
								</div>
								<div class="form-group col-lg-6 col-md-12 email">
									<input type="email" class="form-control" id="email"
										placeholder="Enter email address" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter email address'" style="border: 1px solid #f7631b;">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" placeholder="Subject"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" style="border: 1px solid #f7631b;">
							</div>
							<div class="form-group">
								<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
									required="" style="border: 1px solid #f7631b;"></textarea>
							</div>
							<a href="#" class="primary-btn text-uppercase">Post Comment</a>
						</form>
					</div>
				</div>











				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="{$obj->mBigPassportUrl}" alt="">
							<a href="#">
								<h4>{$obj->mProfilePageTitle}</h4>
							</a>
							<p>
								{$obj->mClassAssigned}
							</p>
							<ul class="social-links">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
							<p>
								Boot camps have its supporters andit sdetractors. Some people do not understand why you
								should have to spend money on boot camp when you can get. Boot camps have itssuppor ters
								andits detractors.
							</p>
						</div>


					</div>
				</div>




			</div>
		</div>
	</section>
	<!-- End post-content Area -->

























