<?php
/* Smarty version 3.1.33, created on 2020-11-24 16:06:25
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_personal_title_and_content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbd2171c76bb3_19890295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29f5abdf11c9fee01b8b07987c41a703f67ef344' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_personal_title_and_content.tpl',
      1 => 1606229491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbd2171c76bb3_19890295 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProfileTitle;?>
</h3>

	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStudentProfileErrMsg) {?>
		<h4 style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentProfileErrMsg;?>
</h4>
	<?php }?>
	
		<p class="excert">
			<p>
				<b>
					My Goals
					<hr>
				</b>
			</p>
			
			<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProfileGoal;?>


		</p>
		
		<br><br>

		<p>
			<p>
				<b>
					My Objectives
					<hr>
				</b>
			</p>
		
			<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProfileObjectives;?>

		</p>

							
</div><?php }
}
