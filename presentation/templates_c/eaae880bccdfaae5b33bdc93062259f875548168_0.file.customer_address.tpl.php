<?php
/* Smarty version 3.1.33, created on 2020-02-25 12:54:30
  from 'C:\xampp\htdocs\bluemark\presentation\templates\customer_address.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e550af63e2823_31873831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaae880bccdfaae5b33bdc93062259f875548168' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\customer_address.tpl',
      1 => 1582631563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e550af63e2823_31873831 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_address",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Address Details
			</h1>	
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
								<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAddressDetails;?>
" method="post">

									<div class="mt-10">
                                        <label><h6>Address 1:</h6></label>
										<input type="text" 
                                        name="address1" 
                                        placeholder="Enter first address here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter first address here'" required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddress1;?>
" 
                                        size="32">
                                         <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAddress1Error) {?>
                                            <p style="color: red;">Your must enter an address.</p>
                                        <?php }?>
									</div>



									<div class="mt-10">
                                    <label><h6>Address 2:</h6></label>
										<input type="text" 
                                        name="address2" 
                                        placeholder="Enter second address here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter second address here'" 
                                        required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddress2;?>
" 
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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCity;?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCityError) {?>
                                            <p style="color: red;">You must enter a city.</p>
                                        <?php }?>
									</div>



                                    <div class="input-group-icon mt-10">
                                    <label><h6>State:</h6></label>
																				<div class="form-select" id="default-select2">
											<select name="region">
												<option value="1">Country</option>
												<option value="1">Bangladesh</option>
												<option value="1">India</option>
												<option value="1">England</option>
												<option value="1">Srilanka</option>
											</select>
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mRegionError) {?>
                                                <p class="error">You must select a state.</p>
                                            <?php }?>
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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPostalCode;?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPostalCodeError) {?>
                                        <p style="color: red;">You must enter a postal code/ZIP.</p>
                                        <?php }?>

									</div>




                                    <div class="input-group-icon mt-10">
                                    <label><h6>Country:</h6></label>
																				<div class="form-select" id="default-select2">
											<select name="country">
												<option value="1">Country</option>
												<option value="1">Nigeria</option>
												<option value="1">India</option>
												<option value="1">England</option>
												<option value="1">Srilanka</option>
											</select>
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCountryError) {?>
                                            <p class="error">You must enter a country.</p>
                                            <?php }?>
										</div>
									</div>




                                    <div class="input-group-icon mt-10">
                                    <label><h6>Shipping Region:</h6></label>
																				<div class="form-select" id="default-select2">
											<select name="shippingRegion">
												<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mShippingRegions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mShippingRegion),$_smarty_tpl);?>

											</select>
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShippingRegionError) {?>
                                            <p class="error">You must select a shipping region.</p>
                                            <?php }?>
										</div>
									</div>


                                    


                                    

                                   

                                    <br>

                                    <input class="genric-btn info radius" type="submit" name="sended" value="Confirm"> <span>&nbsp;</span> 
                                    <a class="genric-btn danger-border radius" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCancelPage;?>
">Cancel</a>

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
			</div><?php }
}
