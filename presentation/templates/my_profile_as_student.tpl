{load_presentation_object filename="profile_student" assign="obj"}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				{$obj->mStudentFullName}
			</h1>	
			<p class="text-white link-nav">
				<a href=""> Reg No.</a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href=""> {$obj->mRegNo}</a>
			</p>
		 </div>	
	</div>
</div>
</section>



<!-- Start post-content Area-->
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


						{* Left column content below student_profile_quick_menu.tpl*}
						{include file=$obj->mLeftColumnContent}
						
						
						{* Left column content above student_quick_menu.tpl*}




						{* middle column content below student_personal_title_and_content.tpl*}
						{include file=$obj->mMiddleColumnContent}
						{* middle column content above student_personal_title_and_content.tpl*}

						<!--  -->
					</div>

					{* bottom column content below view_class_lessons*}
					{include file=$obj->mBottomColumnContent}
					{* bottom column content above *}


				</div>

	
				{* right column content below passport_column.tpl*}
				{include file=$obj->mRightColumnContent}
				
				{* right column content above *}
				{include file=$obj->mStudentInfoBreakDown}
			</div>
		</div>
	</section>
	
	<!-- End post-content Area -->
