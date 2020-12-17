{*cart_details.tpl*}
{load_presentation_object filename="cart_details" assign="obj"}

<div id="updating"></div>



<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Cart Details
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
                    {if $obj->mIsCartNowEmpty eq 1}
                    <h3 class="mb-30"> Your shopping cart is empty! </h3>
                    {else}
						<h3 class="mb-30">These are the products in your shopping cart:</h3>
                        <form class="" method="post" action="{$obj->mUpdateCartTarget}" onsubmit="return executeCartAction(this);">
						<div class="progress-table-wrap">
							<div class="progress-table">

								<div class="table-head">
                               
									<div class="serial"></div>
									<div class="country"><h6>Product Name</h6></div>
									<div class="country"><h6>Price</h6></div>
									<div class="country"><h6>Quantity</h6></div>
									<div class="country"><h6>Subtotal</h6></div>
                                    <div class="country">&nbsp;</div>
                                    <div class="country">&nbsp;</div>
								</div>
{section name=i loop=$obj->mCartProducts}
								<div class="table-row">
                               <div class="serial"></div>
									<div class="country">
                                         <input name="itemId[]" type="hidden" value="{$obj->mCartProducts[i].item_id}">
                                            {$obj->mCartProducts[i].name}
                                        ({$obj->mCartProducts[i].attributes})
                                    </div>

									<div class="country">
                                        N {$obj->mCartProducts[i].price}
                                    </div>

									<div class="country">
                                        <input type="text" name="quantity[]" size="5" value="{$obj->mCartProducts[i].quantity}">
                                    </div>

									<div class="country">
                                        {$obj->mCartProducts[i].subtotal}
                                    </div>

									<div class="country">
                                        <a href="{$obj->mCartProducts[i].save}" onclick="return executeCartAction(this)">Save for later</a>

                                        
                                    </div>

                                    <div class="country">
                                        <a href="{$obj->mCartProducts[i].remove}" onclick="return executeCartAction(this)">Remove</a>
                                    </div>

								</div>
{/section}

								<div class="table-row">
                                <div class="serial"></div>
									<div class="percentage">Total amount:&nbsp;<h6>N{$obj->mTotalAmount}</h6></div>
									<div class="country"></div>
									<div class="visit"></div>
									<div class="percentage">
                                        <input class="genric-btn success small" type="submit" name="update" value="Update">
                                    </div>
									<div class="">
  {if $obj->mShowCheckoutLink}
<a class="genric-btn primary small" href="{$obj->mLinkToCheckout}">Checkout</a>
{/if}
                                    </div>
								</div>


							</div>
						</div>

                        </form>
                        
                        {/if}
					</div>

				</div>
			</div>



            {* saved product to buy later *}
            {if $obj->mIsCartLaterEmpty eq 0}
	<div class="whole-wrap">
				<div class="container">


					<div class="section-top-border">
						<h3 class="mb-30">Saved products to buy later</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">

								<div class="table-head">
									<div class="serial"></div>
									<div class="country">Product Name</div>
									<div class="country">Price</div>
									<div class="country">&nbsp;</div>
									<div class="country">&nbsp;</div>
									{* <div class="percentage">Percentages</div> *}
								</div>
{section name=j loop=$obj->mSavedCartProducts}
								<div class="table-row">
                                <div class="serial"></div>
									<div class="country">
                                          {$obj->mSavedCartProducts[j].name}
                                        ({$obj->mSavedCartProducts[j].attributes})
                                    </div>
									<div class="country">
                                    {$obj->mSavedCartProducts[j].price}
                                    </div>
									<div class="country">
                                        <a href="{$obj->mSavedCartProducts[j].move}" onclick="return executeCartAction(this)">Move to cart</a>
                                        
                                    </div>

                                    <div class="country">
                                        <a href="{$obj->mSavedCartProducts[j].remove}" onclick="return executeCartAction(this)">Remove</a>
                                    </div>
									
								</div>
                            {/section}


							</div>
						</div>
					</div>

				</div>
			</div>

{/if}



<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
        
{if $obj->mLinkToContinueShopping}
    <p><a class="genric-btn info circle arrow" href="{$obj->mLinkToContinueShopping}">Continue Shopping</a></p>
{/if}
        </div>
    </div>
</div>
				


					







		