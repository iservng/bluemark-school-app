{*customer_credit_card.tpl*}
{load_presentation_object filename="customer_credit_card" assign="obj"}

{* {include file="small_banner_area.tpl"} *}
<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Credit Card Details
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
								<h3 class="mb-30">Please enter your credit card details :</h3>
								<form action="{$obj->mLinkToCreditCardDetails}" method="post">

									<div class="mt-10">
                                        <label><h6>Card Holder:</h6></label>
										<input type="text" 
                                        name="cardHolder" 
                                        placeholder="Enter Card Holder here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Card Holder here'" required class="single-input" 
                                        value="{$obj->mPlainCreditCard.card_holder}" 
                                        size="32">
                                        {if $obj->mCardHolderError}
                    <p style="color: red;">You must enter a credit card holder.</p>
                {/if}
									</div>



									<div class="mt-10">
                                    <label><h6>Card Number (digits only):</h6></label>
										<input type="text" 
                                        name="cardNumber" 
                                        placeholder="Enter Card Number (digits only) here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Card Number (digits only) here'" 
                                        required class="single-input" 
                                        value="{$obj->mPlainCreditCard.card_number}" 
                                        size="32">
                                        {if $obj->mCardNumberError}
                    <p style="color: red;">You must enter a card number.</p>
                {/if}
									</div>





									<div class="mt-10">
                                    <label><h6>Expiry Date (MM/YY):</h6></label>
										<input type="text" 
                                        name="expiryDate" 
                                        placeholder="Enter Expiry Date (MM/YY)" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Expiry Date (MM/YY)'" 
                                        required 
                                        class="single-input" 
                                        size="32"
                                        value="{$obj->mPlainCreditCard.expiry_date}">
                                        {if $obj->mExpDateError}
                    <p style="color: red;">You must enter an expiry date.</p>
                {/if}
									</div>



                                    






									<div class="mt-10">
                                    <label><h6>Issue Date (MM/YY if applicable):</h6></label>
										<input type="text" 
                                        name="issueDate" 
                                        placeholder="Enter Issue Date (MM/YY if applicable)" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Issue Date (MM/YY if applicable):'" 
                                        required 
                                        class="single-input"
                                        size="32"
                                        value="{$obj->mPlainCreditCard.issue_date}">
                                        

									</div>






                                    <div class="mt-10">
                                    <label><h6>Issue Number ( if applicable):</h6></label>
										<input type="text" 
                                        name="issueNumber" 
                                        placeholder="Enter Issue Number ( if applicable)" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Issue Number ( if applicable)'" 
                                        required 
                                        class="single-input"
                                        size="32"
                                        value="{$obj->mPlainCreditCard.issue_number}">
                                        

									</div>


                                    <div class="input-group-icon mt-10">
                                    <label><h6>Card Type:</h6></label>
										
										<div class="form-select" id="default-select2">
											<select name="cardType">
												{html_options options=$obj->mCardTypes selected=$obj->mPlainCreditCard.card_type}
											</select>
                                            {if $obj->mCardTypesError}
                                                <p style="color: red;">You must enter a card type</p>
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