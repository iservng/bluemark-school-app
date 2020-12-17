{*application_done.tpl*}
{load_presentation_object filename="application_done" assign="obj"}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Application Complete
			</h1>	
			<p class="text-white link-nav">
				<a href="index.html">  Thank you for choosing {$smarty.const.SCHOOL_NAME}</a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href="events.html">
				{if !$obj->mIsTeacherApplicant}
				 The {$obj->mApplyingFor} has the following information for you.
				{/if}
				</a>
			</p> 
		 </div>	
	</div>
</div>
</section>

			<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<h3 class="text-heading">Dear {$obj->mApplicant}</h3>
					<p class="sample-text">
						{$obj->mApplicantsMeessage}
					</p><br><br>
{if $obj->mIsTeacherApplicant == false}
					<h5>Entrance Examination Schedule</h5>
					<p class="sample-text">
					The entrance examination has be Scheduled to take place in 
					<h6> <u> Date:</u> </h6> {$obj->mEntranceExamDate}
					<br>
					<h6> <u> Venue:</u> </h6>
					{$smarty.const.SCHOOL_NAME} Examination Hall 
					<br>
					<h6> <u> Subjects:</u> </h6> 
					The Examination will cover the following subject area
					<div>{$obj->mSubject_1}</div>
					<div>{$obj->mSubject_2}</div>
					<div>{$obj->mSubject_3}</div>
					</p><br><br>

					<h5>Oral Interview Schedule</h5>
					<p class="sample-text">
						The entrance examination will consist of  oral interview Scheduled to take place follows
						<h6> <u>Date:</u> </h6> {$obj->mOralInterviewDate}
						<h6> <u>Vanue:</u> </h6>
						{$smarty.const.SCHOOL_NAME} Examination Hall as follow:-
					</p><br><br>
					
					<div class="review-top row pt-40">
					<span><a href="" class="genric-btn success medium">Print The Schedule</a></span>
					</div>

					<br><br>
					<h5>From the Admin</h5>
					<p class="sample-text">
					
						Once again thank you for choosing us, it should be  noted also that all successfull candidate wil be published on our site. Registration is Scheduled to follow immediately on <b>{$obj->mAdmissionStartsDate}</b> and will end on <i>{$obj->mAdmissionClosesDate}</i> PLEASE DO NOT hesitate to contact the school management incase of any immergency. We have many great ideas instore just to make you say “wow”. the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs,  

					</p><br><br><br>
{/if}
					<p class="sample-text">
						 <i>Usman Dan-Fodio</i>  
					</p>
					<h6>Head of Admin</h6>

					<div class="review-top row pt-40">
					<span><form action="{$obj->mLinkToApplicationDone}" method="post">
						<input type="hidden" name="exit_page" value="ExitApplicationPage">
						<input class="genric-btn primary radius" type="submit" value="Click and Exit from Applications" name="exitPageBtn">
					</form></span>
					</div>
<hr>
				</div>
			</section>
			<!-- End Sample Area -->