<?php
/* Smarty version 3.1.33, created on 2020-11-26 12:45:37
  from 'C:\xampp\htdocs\bluemark\presentation\templates\passport_column.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbf95612b4ee0_44132483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9290dad05452befb741d37ae8dd7376a58437848' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\passport_column.tpl',
      1 => 1606390861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbf95612b4ee0_44132483 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-4 sidebar-widgets">
	<div class="widget-wrap">
						
		<div class="single-sidebar-widget user-info-widget">
				<img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPasportUrl;?>
" alt="">
					<a href="#">
						<h4><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
</h4>
					</a>
					<p>
						Class: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName;?>

					</p>
					<p>
						<hr><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCurrentTerm;?>
<hr>
					</p>
					<ul class="social-links">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
					</ul>
					<p>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProfileDescribeSelf;?>

					</p><hr>

					
					<p>
						
						<?php if ($_smarty_tpl->tpl_vars['obj']->value->mTakeActionBtn == true && $_smarty_tpl->tpl_vars['obj']->value->mShowBtn == true) {?>
							<h6><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPromoteBtnMsg;?>
</h6>
							<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
">
								<input type="hidden" name="action" value="Activate_new_class">
								<input type="hidden" name="PromotedClassId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPromotedClassId;?>
">
								<input type="submit" name="actionBtn" value="Register">
							</form>
						<?php } else { ?>
							<h6><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPromoteBtnMsg;?>
</h6>
						<?php }?>
					</p>
							</div>


	</div>
</div><?php }
}
