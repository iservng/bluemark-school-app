{*checkout_info.tpl*}
{load_presentation_object filename="checkout_info" assign="obj"}

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Checkout Info
			</h1>	
			<p class="text-white link-nav">
				<h5 style="color: white;"> Your order consists of the following items</h5>  
				{* <span class="lnr lnr-arrow-right"></span>   *}
				{* <a href="events.html"> </a> *}
			</p> 
		 </div>	
	</div>
</div>
</section>


<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">

					{* address wrap one *}
						<div class="col-lg-4 d-flex flex-column address-wrap">
                        {if $obj->mNoShippingAddress == 'yes'}
                        <div class="contact-details">
									<h3 class="mb-30">Alert</h3>
									<h5 style="color: red;">Your address is required please</h5>
									
								</div>
                        {else}
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h3 class="mb-30"> Address:</h3>
									<h5>{$obj->mCustomerData.address_1}</h5>
									<p>
                                    {if $obj->mCustomerData.address_2}
										{$obj->mCustomerData.address_2}<br>
                                    {/if}
                                    
										{$obj->mCustomerData.city}<br>
										{$obj->mCustomerData.region}<br>
										{$obj->mCustomerData.postal_code}<br>
										{$obj->mCustomerData.country}
									</p>

								</div>
							</div>
                        {/if}
							
							
                            {if $obj->mNoCreditCard == 'yes'}
                            <div class="contact-details">
									<h5>No credit card details stored!</h5>
								</div>
                            {else}
                            <div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>{$obj->mCreditCardNote}</h5>
									<p>&nbsp;</p>
								</div>
							</div>
                            {/if}
						</div>

                      
                        

						<div class="col-lg-8">
						{*the former position of form tag*}
							<form class="form-area contact-form text-right" id="" action="" method="post">
								<div class="row">
								
									<div class="">
									
										<div class="progress-table-wrap">
											<div class="progress-table">

												<div class="table-head">
												<div class="serial"></div>
													<div class="percentage">Product Name</div>
													<div class="serial">Price</div>
													<div class="serial">Quantity</div>
													<div class="serial">Subtotal</div>
													
												</div>

 										{section name=i loop=$obj->mCartItems}
												<div class="table-row">
												<div class="serial"></div>
													<div class="percentage">{$obj->mCartItems[i].name} ({$obj->mCartItems[i].attributes}) </div>

													<div class="serial"> {$obj->mCartItems[i].price}</div>

													<div class="serial"> {$obj->mCartItems[i].quantity}</div>

													<div class="serial"> {$obj->mCartItems[i].subtotal}</div>
													
													
												</div>
										{/section}
												
											
											
												
												
												 <div class="table-row">
                                                 <div class="serial"></div>
													<div class="percentage">
                                                    Total Amount:<h6>N {$obj->mTotalAmount}</h6>
                                                    </div>
													
													<div class="country"> </div>
													<div class="visit"></div>
													{if $obj->mNoCreditCard != 'yes' && $obj->mNoShippingAddress != 'yes'}
													<div class="percentage">
														  type:
        <select name="shipping">
            {section name=i loop=$obj->mShippingInfo}
                <option value="{$obj->mShippingInfo[i].shipping_id}">
                    {$obj->mShippingInfo[i].shipping_type}
                </option>
            {/section}
        </select>
													</div>
													{/if}
												</div> 


											</div>
										</div>
									</div>

									
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										{* <button  style="float: right;">Send Message</button> *}

										<input class="genric-btn primary small" type="submit" name="place_order" value="Place Order" {$obj->mOrderButtonVisible}>

									</div>
								</div>
							</form>
						</div>
	<a href="{$obj->mLinkToCart}">Edit Shopping Cart</a> <span>&nbsp;</span> <span>&nbsp;</span>
<a class="genric-btn primary-border small" href="{$obj->mLinkToContinueShopping}">Continue Shopping</a>
					</div>
				</div>
			</section>