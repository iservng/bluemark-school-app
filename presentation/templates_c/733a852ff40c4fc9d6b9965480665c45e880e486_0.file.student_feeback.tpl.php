<?php
/* Smarty version 3.1.33, created on 2020-11-06 04:26:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_feeback.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fa4c271e9bf43_60014007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '733a852ff40c4fc9d6b9965480665c45e880e486' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_feeback.tpl',
      1 => 1604633195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa4c271e9bf43_60014007 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="comment-form">

	 <h3 style="color: #f7631b;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFeedbackMsgTitle;?>
</h3> 
	 <h6 style=""><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFeedbackMsg;?>
</h6> 
    					<br><hr>
	    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
" method="post">

			<input type="hidden" name="" value="">
			<input type="submit" class="primary-btn text-uppercase" name="" value="Back to Profile">
		</form>

        
	
</div><?php }
}
