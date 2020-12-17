<?php
/* Smarty version 3.1.33, created on 2020-03-30 05:53:19
  from 'C:\xampp\htdocs\bluemark\presentation\templates\secondary_application_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e817b3f2d6e15_36729901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14c5acc95a844c1f29c02cdf3b1f4a71904ef5a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\secondary_application_form.tpl',
      1 => 1585543976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e817b3f2d6e15_36729901 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"nursery_application",'assign'=>"obj"),$_smarty_tpl);?>

<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Apply to Secondary
			</h1>	
			 <p class="text-white link-nav">
				<a href="">Secondary Application for Admission </a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href=""> FORM [A]</a>
			</p> 
		 </div>	
	</div>
</div>
</section>



			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
	<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->


						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h3>Read Me</h3>
									<h5>Address</h5>
									<p>
										Address must be a valid residencial address
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>Phone</h5>
									<p>Invalid phone number cannot be accepted</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>Email</h5>
									<p>Create an email address for each registration, and gmail is preferable</p>
								</div>

								

							</div>
<hr>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<!-- <span class="lnr lnr-envelope"></span> -->
								</div>
								<div class="contact-details">
									<h5>Entrance Examination</h5>
									<p>Student applicant should not that they will be tested the the following area:<br>English <br> Mathematics <br>General paper <br> Oral Interview  </p>
								</div>
							
								<hr>
							
							</div>
						</div>



						<!-- the form area  -->
						<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mFormContentCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						

					</div>
				</div>
			</section>
			<!-- End contact-page Area -->


<?php }
}
