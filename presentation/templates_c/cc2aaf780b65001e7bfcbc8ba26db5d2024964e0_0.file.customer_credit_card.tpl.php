<?php
/* Smarty version 3.1.33, created on 2020-02-25 12:53:28
  from 'C:\xampp\htdocs\bluemark\presentation\templates\customer_credit_card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e550ab8173504_07047526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc2aaf780b65001e7bfcbc8ba26db5d2024964e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\customer_credit_card.tpl',
      1 => 1582631598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e550ab8173504_07047526 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_credit_card",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Credit Card Details
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
								<h3 class="mb-30">Please enter your credit card details :</h3>
								<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCreditCardDetails;?>
" method="post">

									<div class="mt-10">
                                        <label><h6>Card Holder:</h6></label>
										<input type="text" 
                                        name="cardHolder" 
                                        placeholder="Enter Card Holder here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Card Holder here'" required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_holder'];?>
" 
                                        size="32">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardHolderError) {?>
                    <p style="color: red;">You must enter a credit card holder.</p>
                <?php }?>
									</div>



									<div class="mt-10">
                                    <label><h6>Card Number (digits only):</h6></label>
										<input type="text" 
                                        name="cardNumber" 
                                        placeholder="Enter Card Number (digits only) here" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Enter Card Number (digits only) here'" 
                                        required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_number'];?>
" 
                                        size="32">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardNumberError) {?>
                    <p style="color: red;">You must enter a card number.</p>
                <?php }?>
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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['expiry_date'];?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mExpDateError) {?>
                    <p style="color: red;">You must enter an expiry date.</p>
                <?php }?>
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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['issue_date'];?>
">
                                        

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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['issue_number'];?>
">
                                        

									</div>


                                    <div class="input-group-icon mt-10">
                                    <label><h6>Card Type:</h6></label>
										
										<div class="form-select" id="default-select2">
											<select name="cardType">
												<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mCardTypes,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mPlainCreditCard['card_type']),$_smarty_tpl);?>

											</select>
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCardTypesError) {?>
                                                <p style="color: red;">You must enter a card type</p>
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
