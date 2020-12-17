<?php
/* Smarty version 3.1.33, created on 2020-02-28 04:52:52
  from 'C:\xampp\htdocs\bluemark\presentation\templates\select_section_for_registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e588e94ca5b24_17692240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '517a44fadaa8fccbb8658d6491418d3c8eb4bba3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\select_section_for_registration.tpl',
      1 => 1582861105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e588e94ca5b24_17692240 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"select_section",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				 <h1 class="text-white">
                    Select Section
				</h1>
				<p class="text-white link-nav">
					<a href="">Select Section below and Continue your </a>
					<span class="lnr lnr-arrow-right"></span>
					<a href=""> Application</a>
				</p> 
			</div>
		</div>
	</div>
</section>

<section class="top-category-widget-area pt-90 pb-90 ">
				<div class="container">
					<div class="row">		
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToNurseryForm;?>
">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
img/blog/cat-widget1.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Nursery Section</h4>
								        <span></span>								        
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPrimaryForm;?>
">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
img/blog/cat-widget2.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Primary Section</h4>
								        <span></span>								        
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-cat-widget">
								<div class="content relative">
									<div class="overlay overlay-bg"></div>
								    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSecondaryForm;?>
">
								      <div class="thumb">
								  		 <img class="content-image img-fluid d-block mx-auto" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
img/blog/cat-widget3.jpg" alt="">
								  	  </div>
								      <div class="content-details">
								        <h4 class="content-title mx-auto text-uppercase">Secondary Section</h4>
								        <span></span>
								        <p>Application for Admission</p>
								      </div>
								    </a>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section><?php }
}
