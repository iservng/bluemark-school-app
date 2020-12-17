<?php
/* Smarty version 3.1.33, created on 2020-02-25 12:54:21
  from 'C:\xampp\htdocs\bluemark\presentation\templates\customer_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e550aed3576c2_06605310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffcd940b41834c9e27a7fa62f93a024a8297df7f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\customer_details.tpl',
      1 => 1582631657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e550aed3576c2_06605310 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"customer_details",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Account Details
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
								<h3 class="mb-30">Please enter your details:</h3>
								<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAccountDetails;?>
" method="post">

									<div class="mt-10">
                                    <label><h6>Email Address:</h6></label>
										<input type="email" 
                                        name="email" 
                                        placeholder="Your email address" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Your email address'" required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditMode) {?> readonly="readonly" <?php }?> 
                                        size="32">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmailAlreadyTaken) {?>
                                            <p style="color: red;">A user with that E-mail address already exists</p>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmailError) {?>
                                            <p style="color: red;">Your must enter an E-mail address</p>
                                        <?php }?>
									</div>



									<div class="mt-10">
                                    <label><h6>Your Name:</h6></label>
										<input type="text" 
                                        name="name" 
                                        placeholder="Your Name" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Your Name'" 
                                        required class="single-input" 
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
" 
                                        size="32">
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNameError) {?>
                                            <p style="color: red;">Your must enter your name.</p>
                                        <?php }?>
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
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPasswordError) {?>
                                            <p style="color: red;">Your must enter a password.</p>
                                        <?php }?>
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


                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditMode) {?>

                                    <div class="mt-10">
                                    <label><h6>Day Phone:</h6></label>
									<input type="text" 
                                        name="dayPhone" 
                                        placeholder="Day Phone" 
                                        onfocus="this.placeholder = ''" 
                                        onblur="this.placeholder = 'Day Phone'" 
                                        required 
                                        class="single-input"
                                        size="32" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDayPhone;?>
">

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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEvePhone;?>
">

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
                                        value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMobPhone;?>
">

									</div>

                                    <?php }?>

                                    <br>

                                    <input class="genric-btn info radius" type="submit" name="sended" value="Confirm"> | 
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
			</div>
<?php }
}
