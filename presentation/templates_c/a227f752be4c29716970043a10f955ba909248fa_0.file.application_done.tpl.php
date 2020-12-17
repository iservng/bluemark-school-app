<?php
/* Smarty version 3.1.33, created on 2020-03-30 07:06:27
  from 'C:\xampp\htdocs\bluemark\presentation\templates\application_done.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e818c63a51873_78867009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a227f752be4c29716970043a10f955ba909248fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\application_done.tpl',
      1 => 1585547597,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e818c63a51873_78867009 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"application_done",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
				Application Complete
			</h1>	
			<p class="text-white link-nav">
				<a href="index.html">  Thank you for choosing <?php echo @constant('SCHOOL_NAME');?>
</a>  
				<span class="lnr lnr-arrow-right"></span>  
				<a href="events.html">
				<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mIsTeacherApplicant) {?>
				 The <?php echo $_smarty_tpl->tpl_vars['obj']->value->mApplyingFor;?>
 has the following information for you.
				<?php }?>
				</a>
			</p> 
		 </div>	
	</div>
</div>
</section>

			<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<h3 class="text-heading">Dear <?php echo $_smarty_tpl->tpl_vars['obj']->value->mApplicant;?>
</h3>
					<p class="sample-text">
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mApplicantsMeessage;?>

					</p><br><br>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsTeacherApplicant == false) {?>
					<h5>Entrance Examination Schedule</h5>
					<p class="sample-text">
					The entrance examination has be Scheduled to take place in 
					<h6> <u> Date:</u> </h6> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mEntranceExamDate;?>

					<br>
					<h6> <u> Venue:</u> </h6>
					<?php echo @constant('SCHOOL_NAME');?>
 Examination Hall 
					<br>
					<h6> <u> Subjects:</u> </h6> 
					The Examination will cover the following subject area
					<div><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubject_1;?>
</div>
					<div><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubject_2;?>
</div>
					<div><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubject_3;?>
</div>
					</p><br><br>

					<h5>Oral Interview Schedule</h5>
					<p class="sample-text">
						The entrance examination will consist of  oral interview Scheduled to take place follows
						<h6> <u>Date:</u> </h6> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOralInterviewDate;?>

						<h6> <u>Vanue:</u> </h6>
						<?php echo @constant('SCHOOL_NAME');?>
 Examination Hall as follow:-
					</p><br><br>
					
					<div class="review-top row pt-40">
					<span><a href="" class="genric-btn success medium">Print The Schedule</a></span>
					</div>

					<br><br>
					<h5>From the Admin</h5>
					<p class="sample-text">
					
						Once again thank you for choosing us, it should be  noted also that all successfull candidate wil be published on our site. Registration is Scheduled to follow immediately on <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAdmissionStartsDate;?>
</b> and will end on <i><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAdmissionClosesDate;?>
</i> PLEASE DO NOT hesitate to contact the school management incase of any immergency. We have many great ideas instore just to make you say “wow”. the<sup>Superscript</sup> scene, or video renters with their big project.  But once you have the<sub>Subscript</sub> “in the can” (no easy feat), how do you move from a <del>Strike</del> through of master DVDs with the <u>“Underline”</u> marked hand-written title inside a secondhand CD case, to a pile of cardboard boxes full of shiny new, retail-ready DVDs,  

					</p><br><br><br>
<?php }?>
					<p class="sample-text">
						 <i>Usman Dan-Fodio</i>  
					</p>
					<h6>Head of Admin</h6>

					<div class="review-top row pt-40">
					<span><form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToApplicationDone;?>
" method="post">
						<input type="hidden" name="exit_page" value="ExitApplicationPage">
						<input class="genric-btn primary radius" type="submit" value="Click and Exit from Applications" name="exitPageBtn">
					</form></span>
					</div>
<hr>
				</div>
			</section>
			<!-- End Sample Area --><?php }
}
