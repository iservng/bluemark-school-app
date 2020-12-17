{*select_section_for_registration.tpl*}
{load_presentation_object filename="select_section" assign="obj"}

<section class="banner-area relative about-banner" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				 <h1 class="text-white">
                    Select Section
				</h1>
				<p class="text-white link-nav">
					<a href="">Select Section below and Continue your </a>
					<span class="lnr lnr-arrow-right"></span>
					<a href=""> Application</a>
				</p> 
			</div>
		</div>
	</div>
</section>

{*select araea below *}
<section class="top-category-widget-area pt-90 pb-90 ">
				<div class="container">
					<div class="row">		
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="{$obj->mLinkToNurseryForm}">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="{$obj->mSiteUrl}img/blog/cat-widget1.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Nursery Section</h4>
								        <span></span>								        
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="{$obj->mLinkToPrimaryForm}">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="{$obj->mSiteUrl}img/blog/cat-widget2.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Primary Section</h4>
								        <span></span>								        
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="{$obj->mLinkToSecondaryForm}">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="{$obj->mSiteUrl}img/blog/cat-widget3.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Secondary Section</h4>
								        <span></span>
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>