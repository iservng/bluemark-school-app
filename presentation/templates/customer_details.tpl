{*customer_details.tpl*}
{load_presentation_object filename="customer_details" assign="obj"}
{* {include file="small_banner_area.tpl"} *}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Account Details
			</h1>	
		{* 	<p class="text-white link-nav">
				<a href="index.html"> </a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href="events.html"> </a>
			</p> *}
		 </div>	
	</div>
</div>
</section>
<div class="whole-wrap">
				<div class="container">

					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30">Please enter your details:</h3>
								<form action="{$obj->mLinkToAccountDetails}" method="post">

									<div class="mt-10">
                                    <label><h6>Email Address:</h6></label>
										<input type="email" 
                                        name="email" 
                                        placeholder="Your email address" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Your email address'" required class="single-input" 
                                        value="{$obj->mEmail}" {if $obj->mEditMode} readonly="readonly" {/if} 
                                        size="32">
                                        {if $obj->mEmailAlreadyTaken}
                                            <p style="color: red;">A user with that E-mail address already exists</p>
                                        {/if}
                                        {if $obj->mEmailError}
                                            <p style="color: red;">Your must enter an E-mail address</p>
                                        {/if}
									</div>



									<div class="mt-10">
                                    <label><h6>Your Name:</h6></label>
										<input type="text" 
                                        name="name" 
                                        placeholder="Your Name" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Your Name'" 
                                        required class="single-input" 
                                        value="{$obj->mName}" 
                                        size="32">
                                        {if $obj->mNameError}
                                            <p style="color: red;">Your must enter your name.</p>
                                        {/if}
									</div>





									<div class="mt-10">
                                    <label><h6>Your Password:</h6></label>
										<input type="password" 
                                        name="password" 
                                        placeholder="Your Password" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Your Password'" 
                                        required 
                                        class="single-input" 
                                        size="32">
                                        {if $obj->mPasswordError}
                                            <p style="color: red;">Your must enter a password.</p>
                                        {/if}
									</div>






									<div class="mt-10">
                                    <label><h6>Re-enter your Password:</h6></label>
										<input type="password" 
                                        name="passwordConfirm" 
                                        placeholder="Re-enter Password" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Re-enter Password'" 
                                        required 
                                        class="single-input"
                                        size="32">

									</div>


                                    {if $obj->mEditMode}

                                    <div class="mt-10">
                                    <label><h6>Day Phone:</h6></label>
									<input type="text" 
                                        name="dayPhone" 
                                        placeholder="Day Phone" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Day Phone'" 
                                        required 
                                        class="single-input"
                                        size="32" value="{$obj->mDayPhone}">

									</div>


                                    <div class="mt-10">
                                    <label><h6>Eve Phone:</h6></label>
									<input type="text" 
                                        name="evePhone" 
                                        placeholder="Eve Phone" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Eve Phone'" 
                                        required 
                                        class="single-input"
                                        size="32"
                                        value="{$obj->mEvePhone}">

									</div>


                                    <div class="mt-10">
                                    <label><h6>Mobile Phone:</h6></label>
									<input type="text" 
                                        name="mobPhone" 
                                        placeholder="Mobile Phone" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Mobile Phone'" 
                                        required 
                                        class="single-input"
                                        size="32"
                                        value="{$obj->mMobPhone}">

									</div>

                                    {/if}

                                    <br>

                                    <input class="genric-btn info radius" type="submit" name="sended" value="Confirm"> | 
                                    <a class="genric-btn danger-border radius" href="{$obj->mLinkToCancelPage}">Cancel</a>

								</form>
							</div>

							<!-- the right column -->
							<div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
								<div class="single-element-widget">
									<h3 class="mb-30"></h3>
								</div>

								<div class="single-element-widget">
									<h3 class="mb-30"></h3>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
