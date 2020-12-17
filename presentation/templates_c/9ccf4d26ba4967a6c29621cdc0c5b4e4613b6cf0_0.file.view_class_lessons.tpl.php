<?php
/* Smarty version 3.1.33, created on 2020-11-02 15:32:39
  from 'C:\xampp\htdocs\bluemark\presentation\templates\view_class_lessons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fa018873265b7_99967430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ccf4d26ba4967a6c29621cdc0c5b4e4613b6cf0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\view_class_lessons.tpl',
      1 => 1604325841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa018873265b7_99967430 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="comment-form">
	<!-- <h4>Leave a Comment</h4> -->
    					
	    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
" method="post">

			<input type="hidden" name="action" value="ListClassLessons">
			<input type="submit" class="primary-btn text-uppercase" name="ViewClassLessonsBtn" value="View Class Lessons">
		</form>
	
</div><?php }
}
