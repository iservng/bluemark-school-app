{*customer_addres.tpl*}
{load_presentation_object filename="customer_address" assign="obj"}

{* {include file="small_banner_area.tpl"} *}
<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Address Details
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
								<h3 class="mb-30">Please enter your address :</h3>
								<form action="{$obj->mLinkToAddressDetails}" method="post">

									<div class="mt-10">
                                        <label><h6>Address 1:</h6></label>
										<input type="text" 
                                        name="address1" 
                                        placeholder="Enter first address here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter first address here'" required class="single-input" 
                                        value="{$obj->mAddress1}" 
                                        size="32">
                                         {if $obj->mAddress1Error}
                                            <p style="color: red;">Your must enter an address.</p>
                                        {/if}
									</div>



									<div class="mt-10">
                                    <label><h6>Address 2:</h6></label>
										<input type="text" 
                                        name="address2" 
                                        placeholder="Enter second address here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter second address here'" 
                                        required class="single-input" 
                                        value="{$obj->mAddress2}" 
                                        size="32">
                                        
									</div>





									<div class="mt-10">
                                    <label><h6>Town/City:</h6></label>
										<input type="text" 
                                        name="city" 
                                        placeholder="Enter your Town/City" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter your Town/City'" 
                                        required 
                                        class="single-input" 
                                        size="32"
                                        value="{$obj->mCity}">
                                        {if $obj->mCityError}
                                            <p style="color: red;">You must enter a city.</p>
                                        {/if}
									</div>



                                    <div class="input-group-icon mt-10">
                                    <label><h6>State:</h6></label>
										{* <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> *}
										<div class="form-select" id="default-select2">
											<select name="region">
												<option value="1">Country</option>
												<option value="1">Bangladesh</option>
												<option value="1">India</option>
												<option value="1">England</option>
												<option value="1">Srilanka</option>
											</select>
                                            {if $obj->mRegionError}
                                                <p class="error">You must select a state.</p>
                                            {/if}
										</div>
									</div>






									<div class="mt-10">
                                    <label><h6>Postal Code/ZIP:</h6></label>
										<input type="text" 
                                        name="postalCode" 
                                        placeholder="Enter Postal Code/ZIP" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Postal Code/ZIP'" 
                                        required 
                                        class="single-input"
                                        size="32"
                                        value="{$obj->mPostalCode}">
                                        {if $obj->mPostalCodeError}
                                        <p style="color: red;">You must enter a postal code/ZIP.</p>
                                        {/if}

									</div>




                                    <div class="input-group-icon mt-10">
                                    <label><h6>Country:</h6></label>
										{* <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> *}
										<div class="form-select" id="default-select2">
											<select name="country">
												<option value="1">Country</option>
												<option value="1">Nigeria</option>
												<option value="1">India</option>
												<option value="1">England</option>
												<option value="1">Srilanka</option>
											</select>
                                            {if $obj->mCountryError}
                                            <p class="error">You must enter a country.</p>
                                            {/if}
										</div>
									</div>




                                    <div class="input-group-icon mt-10">
                                    <label><h6>Shipping Region:</h6></label>
										{* <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> *}
										<div class="form-select" id="default-select2">
											<select name="shippingRegion">
												{html_options options=$obj->mShippingRegions selected=$obj->mShippingRegion}
											</select>
                                            {if $obj->mShippingRegionError}
                                            <p class="error">You must select a shipping region.</p>
                                            {/if}
										</div>
									</div>


                                    


                                    

                                   

                                    <br>

                                    <input class="genric-btn info radius" type="submit" name="sended" value="Confirm"> <span>&nbsp;</span> 
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