<?php
/* Smarty version 3.1.33, created on 2020-07-02 16:58:48
  from 'C:\xampp\htdocs\bluemark\presentation\templates\cart_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efe043890a8f8_14412676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c6997bde0f8a4bafbddcc3d5524f61194e9b1de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\cart_details.tpl',
      1 => 1585583763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe043890a8f8_14412676 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"cart_details",'assign'=>"obj"),$_smarty_tpl);?>


<div id="updating"></div>



<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Cart Details
			</h1>	
				 </div>	
	</div>
</div>
</section>


<div class="whole-wrap">
				<div class="container">


					<div class="section-top-border">
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsCartNowEmpty == 1) {?>
                    <h3 class="mb-30"> Your shopping cart is empty! </h3>
                    <?php } else { ?>
						<h3 class="mb-30">These are the products in your shopping cart:</h3>
                        <form class="" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUpdateCartTarget;?>
" onsubmit="return executeCartAction(this);">
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
<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<div class="table-row">
                               <div class="serial"></div>
									<div class="country">
                                         <input name="itemId[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['item_id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                                        (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributes'];?>
)
                                    </div>

									<div class="country">
                                        N <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['price'];?>

                                    </div>

									<div class="country">
                                        <input type="text" name="quantity[]" size="5" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
">
                                    </div>

									<div class="country">
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subtotal'];?>

                                    </div>

									<div class="country">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['save'];?>
" onclick="return executeCartAction(this)">Save for later</a>

                                        
                                    </div>

                                    <div class="country">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['remove'];?>
" onclick="return executeCartAction(this)">Remove</a>
                                    </div>

								</div>
<?php
}
}
?>

								<div class="table-row">
                                <div class="serial"></div>
									<div class="percentage">Total amount:&nbsp;<h6>N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
</h6></div>
									<div class="country"></div>
									<div class="visit"></div>
									<div class="percentage">
                                        <input class="genric-btn success small" type="submit" name="update" value="Update">
                                    </div>
									<div class="">
  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowCheckoutLink) {?>
<a class="genric-btn primary small" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckout;?>
">Checkout</a>
<?php }?>
                                    </div>
								</div>


							</div>
						</div>

                        </form>
                        
                        <?php }?>
					</div>

				</div>
			</div>



                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsCartLaterEmpty == 0) {?>
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
																	</div>
<?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
								<div class="table-row">
                                <div class="serial"></div>
									<div class="country">
                                          <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>

                                        (<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['attributes'];?>
)
                                    </div>
									<div class="country">
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['price'];?>

                                    </div>
									<div class="country">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['move'];?>
" onclick="return executeCartAction(this)">Move to cart</a>
                                        
                                    </div>

                                    <div class="country">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['remove'];?>
" onclick="return executeCartAction(this)">Remove</a>
                                    </div>
									
								</div>
                            <?php
}
}
?>


							</div>
						</div>
					</div>

				</div>
			</div>

<?php }?>



<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
        
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping) {?>
    <p><a class="genric-btn info circle arrow" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a></p>
<?php }?>
        </div>
    </div>
</div>
				


					







		<?php }
}
