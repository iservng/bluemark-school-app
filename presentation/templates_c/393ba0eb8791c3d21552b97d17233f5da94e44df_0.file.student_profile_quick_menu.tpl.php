<?php
/* Smarty version 3.1.33, created on 2020-11-24 16:47:05
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_profile_quick_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbd2af9197b27_42724953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '393ba0eb8791c3d21552b97d17233f5da94e44df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_profile_quick_menu.tpl',
      1 => 1606232819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbd2af9197b27_42724953 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-3  col-md-3 meta-details">
	<ul class="tags">
		<li><a href="#">Food,</a></li>
		<li><a href="#">Technology,</a></li>
		<li><a href="#">Politics,</a></li>
		<li><a href="#">Lifestyle</a></li>
	</ul>
	<div class="user-details row">
		<p class="user-name col-lg-12 col-md-12 col-6">
            
            <span class="lnr lnr-user"></span>
			<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentEmail;?>
</a> 
        </p>

		<p class="date col-lg-12 col-md-12 col-6">
		 
            <a href="#"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDateOfBirth;?>
</a> 
           <span class="lnr lnr-calendar-full"></span>
        </p>

		<p class="view col-lg-12 col-md-12 col-6">
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentCA;?>
" class="genric-btn primary small">Views CAs </a> 
            <span class="lnr lnr-eye"></span>
        </p>

		<p class="comments col-lg-12 col-md-12 col-6">
            <a href="#">06 Comments</a> 
            <span class="lnr lnr-bubble"></span>
        </p>

		<ul class="social-links col-lg-12 col-md-12 col-6">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-github"></i></a></li>
			<li><a href="#"><i class="fa fa-behance"></i></a></li>
		</ul>
	</div>
</div><?php }
}
