<?php
/* Smarty version 3.1.33, created on 2020-02-26 03:45:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\checkout_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e55dbd53c6fb6_15138859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17325ca7645338f7e429436db44b6e7ece570104' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\checkout_info.tpl',
      1 => 1582685134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e55dbd53c6fb6_15138859 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"checkout_info",'assign'=>"obj"),$_smarty_tpl);?>


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
											</p> 
		 </div>	
	</div>
</div>
</section>


<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">

											<div class="col-lg-4 d-flex flex-column address-wrap">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress == 'yes') {?>
                        <div class="contact-details">
									<h3 class="mb-30">Alert</h3>
									<h5 style="color: red;">Your address is required please</h5>
									
								</div>
                        <?php } else { ?>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h3 class="mb-30"> Address:</h3>
									<h5><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_1'];?>
</h5>
									<p>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_2']) {?>
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['address_2'];?>
<br>
                                    <?php }?>
                                    
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['city'];?>
<br>
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['region'];?>
<br>
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['postal_code'];?>
<br>
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['country'];?>

									</p>

								</div>
							</div>
                        <?php }?>
							
							
                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard == 'yes') {?>
                            <div class="contact-details">
									<h5>No credit card details stored!</h5>
								</div>
                            <?php } else { ?>
                            <div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCreditCardNote;?>
</h5>
									<p>&nbsp;</p>
								</div>
							</div>
                            <?php }?>
						</div>

                      
                        

						<div class="col-lg-8">
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

 										<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartItems) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
												<div class="table-row">
												<div class="serial"></div>
													<div class="percentage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
) </div>

													<div class="serial"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['price'];?>
</div>

													<div class="serial"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
</div>

													<div class="serial"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subtotal'];?>
</div>
													
													
												</div>
										<?php
}
}
?>
												
											
											
												
												
												 <div class="table-row">
                                                 <div class="serial"></div>
													<div class="percentage">
                                                    Total Amount:<h6>N <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</h6>
                                                    </div>
													
													<div class="country"> </div>
													<div class="visit"></div>
													<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard != 'yes' && $_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress != 'yes') {?>
													<div class="percentage">
														  type:
        <select name="shipping">
            <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mShippingInfo) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['shipping_id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['shipping_type'];?>

                </option>
            <?php
}
}
?>
        </select>
													</div>
													<?php }?>
												</div> 


											</div>
										</div>
									</div>

									
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										
										<input class="genric-btn primary small" type="submit" name="place_order" value="Place Order" <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderButtonVisible;?>
>

									</div>
								</div>
							</form>
						</div>
	<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCart;?>
">Edit Shopping Cart</a> <span>&nbsp;</span> <span>&nbsp;</span>
<a class="genric-btn primary-border small" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a>
					</div>
				</div>
			</section><?php }
}
