<?php
/* Smarty version 3.1.33, created on 2020-11-23 14:43:34
  from 'C:\xampp\htdocs\bluemark\presentation\templates\my_profile_as_student.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbbbc8666a484_50958209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a10aff166fb67892315e58ed93a572b00acf53d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\my_profile_as_student.tpl',
      1 => 1606138831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbbbc8666a484_50958209 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"profile_student",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>

			</h1>	
			<p class="text-white link-nav">
				<a href=""> Reg No.</a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href=""> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mRegNo;?>
</a>
			</p>
		 </div>	
	</div>
</div>
</section>



<!-- Start post-content Area-->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<!-- <img class="img-fluid" src="img/blog/feature-img1.jpg" alt=""> -->
							</div>
						</div>


												<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mLeftColumnContent, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						
						
						



												<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mMiddleColumnContent, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						
						<!--  -->
					</div>

										<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mBottomColumnContent, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					

				</div>

	
								<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mRightColumnContent, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				
								<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mStudentInfoBreakDown, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
			</div>
		</div>
	</section>
	
	<!-- End post-content Area -->
<?php }
}
