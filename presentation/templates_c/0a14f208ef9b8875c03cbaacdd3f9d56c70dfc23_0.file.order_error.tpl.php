<?php
/* Smarty version 3.1.33, created on 2020-02-26 04:20:57
  from 'C:\xampp\htdocs\bluemark\presentation\templates\order_error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e55e4191a99c0_34122073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a14f208ef9b8875c03cbaacdd3f9d56c70dfc23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\order_error.tpl',
      1 => 1582686460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e55e4191a99c0_34122073 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			 <h1 class="text-white">
					An error has occurred			
			</h1>	
			<p class="text-white link-nav" style="color: white;">If you have an enquiry regarding this message please email
				 
				<span class="lnr lnr-arrow-right"></span>  
				<a style="color: white;" href="mailto:<?php echo @constant('CUSTOMER_SERVICE_EMAIL');?>
"> 
                <?php echo @constant('CUSTOMER_SERVICE_EMAIL');?>

                </a> 
			</p> 
		 </div>	
	</div>
</div>
</section><?php }
}
