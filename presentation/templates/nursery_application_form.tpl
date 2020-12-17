{*nursery_application_form.tpl*}
{load_presentation_object filename="nursery_application" assign="obj"}
{*small banner area.tpl*}
<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Apply to Nursery 
			</h1>	
			 <p class="text-white link-nav">
				<a href="">Nursery Application for Admission </a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href=""> FORM [A]</a>
			</p> 
		 </div>	
	</div>
</div>
</section>


{*the nursery form below *}

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
	<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->


						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h3>Read Me</h3>
									<h5>Address</h5>
									<p>
										Address must be a valid residencial address
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>Phone</h5>
									<p>Invalid phone number cannot be accepted</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>Email</h5>
									<p>Create an email address for each registration, and gmail is preferable</p>
								</div>

								

							</div>
<hr>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<!-- <span class="lnr lnr-envelope"></span> -->
								</div>
								<div class="contact-details">
									<h5>Entrance Examination</h5>
									<p>Student applicant should not that they will be tested the the following area:<br>English <br> Mathematics <br>General paper <br> Oral Interview  </p>
								</div>
							
								<hr>
							
							</div>
						</div>



						<!-- the form area  -->
						{include file=$obj->mFormContentCell}
						

					</div>
				</div>
			</section>
			<!-- End contact-page Area -->


